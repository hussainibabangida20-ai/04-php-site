<?php
declare(strict_types=1);

$pageTitle = 'Home';
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Digital solutions that help businesses grow.</h1>
        <p class="lead">SHUAIBTECH helps startups, SMEs, and growing brands turn ideas into smooth digital experiences through strategy, software, branding, and marketing support.</p>
        <div class="button-row">
            <a href="services.php" class="button">Explore Services</a>
            <a href="contact.php" class="button-secondary">Talk to Us</a>
        </div>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <h2>What we do</h2>
        <div class="grid">
            <article class="card">
                <h3>Web Development</h3>
                <p>Modern websites and web applications designed for performance, clarity, and conversion.</p>
            </article>
            <article class="card">
                <h3>Brand Strategy</h3>
                <p>Positioning, messaging, and creative systems that make your business memorable.</p>
            </article>
            <article class="card">
                <h3>Business Support</h3>
                <p>Digital operations support, consultation, and tools to help teams work smarter.</p>
            </article>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
