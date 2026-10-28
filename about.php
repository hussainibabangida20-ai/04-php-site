<?php
declare(strict_types=1);

$pageTitle = 'About';
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>About SHUAIBTECH</h1>
        <p class="lead">We are a digital-first business consultancy helping organizations build better systems, stronger brands, and clearer customer experiences.</p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div class="team-grid">
            <?php foreach ($team as $member): ?>
                <article class="card team-card">
                    <h3><?php echo e((string) $member['name']); ?></h3>
                    <p class="team-role"><?php echo e((string) $member['role']); ?></p>
                    <p><?php echo e((string) $member['bio']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
