<?php
declare(strict_types=1);
?>
    </main>

    <footer class="site-footer">
        <div class="container footer-inner">
            <p>© <?php echo e(date('Y')); ?> <?php echo e((string) ($siteName ?? 'SHUAIBTECH')); ?>. <?php echo e((string) ($tagline ?? 'Providing Digital Solutions Ltd')); ?></p>
            <p><a href="mailto:<?php echo e((string) ($contactEmail ?? 'hello@shuaibtech.com')); ?>"><?php echo e((string) ($contactEmail ?? 'hello@shuaibtech.com')); ?></a></p>
        </div>
    </footer>
</body>
</html>
