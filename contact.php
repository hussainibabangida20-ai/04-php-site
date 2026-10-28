<?php
declare(strict_types=1);

$pageTitle = 'Contact';
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
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

        <div class="contact-card">
            <h3>Start a Conversation</h3>
            <p>We help businesses turn ideas into digital experiences that are functional, clear, and scalable.</p>
            <div class="button-row">
                <a href="mailto:<?php echo e((string) $contactEmail); ?>" class="button">Email Us</a>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
