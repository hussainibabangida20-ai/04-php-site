<?php
declare(strict_types=1);

$pageTitle = 'Services';
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Services built for growth.</h1>
        <p class="lead">From strategy to execution, SHUAIBTECH delivers digital services designed to improve visibility, performance, and customer experience.</p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div class="service-grid">
            <?php foreach ($services as $service): ?>
                <?php echo renderServiceCard($service); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
