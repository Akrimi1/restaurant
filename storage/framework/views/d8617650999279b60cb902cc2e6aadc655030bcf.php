<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-<?php echo e(setting('theme_contrast')); ?>-<?php echo e(setting('theme_color')); ?> cus_shadow">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('dashboard')); ?>" class="brand-link <?php echo e(setting('logo_bg_color','bg-white')); ?>">
        <img src="<?php echo e(url('/')); ?>/images/logo_default.png" alt="<?php echo e(setting('app_name')); ?>" class="brand-image">
        <!--<img src="<?php echo e($app_logo); ?>" alt="<?php echo e(setting('app_name')); ?>" class="brand-image">-->
        <span class="brand-text font-weight-light"></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column sidebar-menu" data-widget="treeview" role="menu" data-accordion="false">
                <?php echo $__env->make('layouts.menu',['icons'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH C:\wamp64\www\karri.li\public_html\restaurant\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>