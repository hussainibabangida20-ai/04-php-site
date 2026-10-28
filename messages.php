<?php
declare(strict_types=1);

session_start();

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Messages';

$messages = [];
$messageFile = __DIR__ . '/storage/messages.jsonl';
$accessGranted = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    if ($password === $messagesPassword) {
        $_SESSION['messages_access'] = true;
    } else {
        $loginError = 'Incorrect password.';
    }
}

if (!empty($_SESSION['messages_access']) || isset($_SESSION['messages_access']) && $_SESSION['messages_access'] === true) {
    $accessGranted = true;
}

if ($accessGranted && is_file($messageFile)) {
    $lines = file($messageFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $messages = [];

    foreach (array_reverse($lines) as $line) {
        $decoded = json_decode((string) $line, true);
        if (is_array($decoded)) {
            $messages[] = $decoded;
        }
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Contact Messages</h1>
        <p class="lead">Review contact form submissions stored locally for this learning project.</p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <?php if (!$accessGranted): ?>
            <div class="contact-card" style="max-width: 420px; margin: 0 auto;">
                <h3>Protected Access</h3>
                <?php if (isset($loginError)): ?>
                    <div class="alert error"><?php echo e($loginError); ?></div>
                <?php endif; ?>
                <form method="post" action="messages.php">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" required>
                    </div>
                    <button type="submit" class="button">Unlock</button>
                </form>
            </div>
        <?php else: ?>
            <div class="message-toolbar">
                <span class="count-badge"><?php echo e((string) count($messages)); ?></span>
                <span>submissions</span>
            </div>

            <?php if ($messages === []): ?>
                <div class="alert success">No messages found yet.</div>
            <?php else: ?>
                <div class="table-wrap">
                    <table class="messages-table">
                        <thead>
                            <tr>
                                <th>Timestamp</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Service</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($messages as $message): ?>
                                <tr>
                                    <td><?php echo e((string) ($message['timestamp'] ?? '')); ?></td>
                                    <td><?php echo e((string) ($message['name'] ?? '')); ?></td>
                                    <td><?php echo e((string) ($message['email'] ?? '')); ?></td>
                                    <td><?php echo e((string) ($message['phone'] ?? '')); ?></td>
                                    <td><?php echo e((string) ($message['service'] ?? '')); ?></td>
                                    <td><?php echo e((string) ($message['message'] ?? '')); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
