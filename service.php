<?php
declare(strict_types=1);

$pageTitle = 'Service Details';
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/header.php';

$slug = isset($_GET['slug']) ? (string) $_GET['slug'] : '';
$service = null;

foreach ($services as $item) {
    if (($item['slug'] ?? '') === $slug) {
        $service = $item;
        break;
    }
}

if ($service === null) {
    http_response_code(404);
    ?>
    <section class="page-hero">
        <div class="container">
            <h1>Service Not Found</h1>
            <p class="lead">The service you requested could not be found. Please explore our available digital solutions.</p>
            <div class="button-row">
                <a href="services.php" class="button">Back to Services</a>
            </div>
        </div>
    </section>
    <?php
    require_once __DIR__ . '/includes/footer.php';
    exit;
}
?>

<section class="page-hero">
    <div class="container">
        <h1><?php echo e((string) $service['title']); ?></h1>
        <p class="lead"><?php echo e((string) $service['description']); ?></p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <article class="card service-detail-card">
            <div class="service-icon"><?php echo e((string) $service['icon']); ?></div>
            <h2><?php echo e((string) $service['title']); ?></h2>
            <p><?php echo e((string) $service['description']); ?></p>
            <p class="price"><?php echo e(formatPrice((float) $service['price'])); ?></p>
            <div class="button-row">
                <a href="services.php" class="button-secondary">View All Services</a>
                <a href="contact.php" class="button">Book This Service</a>
            </div>
        </article>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
