<?php
declare(strict_types=1);

session_start();

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Contact';

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$errors = [];
$submitted = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'service' => '',
    'message' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrfToken = $_POST['csrf_token'] ?? '';
    if (!hash_equals($_SESSION['csrf_token'], (string) $csrfToken)) {
        $errors['csrf'] = 'Invalid request. Please try again.';
    }

    foreach ($submitted as $field => $value) {
        $submitted[$field] = isset($_POST[$field]) ? trim((string) $_POST[$field]) : '';
    }

    if ($submitted['name'] === '') {
        $errors['name'] = 'Name is required.';
    }

    if ($submitted['email'] === '') {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($submitted['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }

    if ($submitted['service'] === '') {
        $errors['service'] = 'Please select a service.';
    }

    if ($submitted['message'] === '') {
        $errors['message'] = 'Message is required.';
    } elseif (mb_strlen($submitted['message']) < 10 || mb_strlen($submitted['message']) > 1000) {
        $errors['message'] = 'Message must be between 10 and 1000 characters.';
    }

    if (empty($errors)) {
        $storageDir = __DIR__ . '/storage';
        if (!is_dir($storageDir)) {
            mkdir($storageDir, 0777, true);
        }

        $storageFile = $storageDir . '/messages.jsonl';
        $payload = [
            'timestamp' => date('c'),
            'name' => $submitted['name'],
            'email' => $submitted['email'],
            'phone' => $submitted['phone'],
            'service' => $submitted['service'],
            'message' => $submitted['message'],
        ];

        $handle = fopen($storageFile, 'ab');
        if ($handle !== false) {
            flock($handle, LOCK_EX);
            fwrite($handle, json_encode($payload, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES) . PHP_EOL);
            fflush($handle);
            flock($handle, LOCK_UN);
            fclose($handle);
        }

        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        header('Location: contact.php?sent=1');
        exit;
    }
}

if (isset($_GET['sent']) && $_GET['sent'] === '1') {
    $successMessage = 'Thanks! Your message has been sent successfully.';
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Let’s build something meaningful.</h1>
        <p class="lead">Tell us about your goals, and we’ll help you choose the right digital approach for your business.</p>
    </div>
</section>

<section class="content-section">
    <div class="container contact-box">
        <div class="contact-card">
            <h3>Contact Information</h3>
            <p><strong>Email:</strong> <a href="mailto:<?php echo e((string) $contactEmail); ?>"><?php echo e((string) $contactEmail); ?></a></p>
            <p><strong>Business:</strong> <?php echo e((string) $siteName); ?></p>
            <p><strong>Focus:</strong> Digital strategy, web development, and business growth support.</p>
        </div>

        <div class="contact-card form-card">
            <h3>Start a Conversation</h3>
            <?php if (isset($successMessage)): ?>
                <div class="alert success"><?php echo e($successMessage); ?></div>
            <?php endif; ?>

            <?php if (isset($errors['csrf'])): ?>
                <div class="alert error"><?php echo e($errors['csrf']); ?></div>
            <?php endif; ?>

            <form method="post" action="contact.php" novalidate>
                <input type="hidden" name="csrf_token" value="<?php echo e($_SESSION['csrf_token']); ?>">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" value="<?php echo e($submitted['name']); ?>" required>
                    <?php if (isset($errors['name'])): ?>
                        <small class="error-text"><?php echo e($errors['name']); ?></small>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="<?php echo e($submitted['email']); ?>" required>
                    <?php if (isset($errors['email'])): ?>
                        <small class="error-text"><?php echo e($errors['email']); ?></small>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="phone">Phone (optional)</label>
                    <input id="phone" name="phone" type="tel" value="<?php echo e($submitted['phone']); ?>">
                </div>

                <div class="form-group">
                    <label for="service">Service</label>
                    <select id="service" name="service" required>
                        <option value="">Select a service</option>
                        <?php foreach ($services as $service): ?>
                            <option value="<?php echo e((string) $service['slug']); ?>" <?php echo $submitted['service'] === (string) $service['slug'] ? 'selected' : ''; ?>>
                                <?php echo e((string) $service['title']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['service'])): ?>
                        <small class="error-text"><?php echo e($errors['service']); ?></small>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="6" required><?php echo e($submitted['message']); ?></textarea>
                    <?php if (isset($errors['message'])): ?>
                        <small class="error-text"><?php echo e($errors['message']); ?></small>
                    <?php endif; ?>
                </div>

                <button type="submit" class="button">Send Message</button>
            </form>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
