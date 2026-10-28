<?php
declare(strict_types=1);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo e((string) ($tagline ?? 'Digital solutions for modern businesses')); ?>">
    <title><?php echo e((string) ($pageTitle ?? $siteName ?? 'SHUAIBTECH')); ?> | <?php echo e((string) ($siteName ?? 'SHUAIBTECH')); ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="container nav-inner">
            <a href="index.php" class="brand" aria-label="SHUAIBTECH home">
                <span class="brand-mark">S</span>
                <?php echo e((string) ($siteName ?? 'SHUAIBTECH')); ?>
            </a>

            <nav class="site-nav" aria-label="Main navigation">
                <ul class="nav-links">
                    <?php foreach ($navItems as $label => $file): ?>
                        <?php $isCurrent = basename((string) $_SERVER['PHP_SELF']) === $file; ?>
                        <li>
                            <a href="<?php echo e((string) $file); ?>"
                               class="<?php echo $isCurrent ? 'active' : ''; ?>"
                               <?php if ($isCurrent) { echo 'aria-current="page"'; } ?>>
                                <?php echo e((string) $label); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </header>

    <main class="page-main">
