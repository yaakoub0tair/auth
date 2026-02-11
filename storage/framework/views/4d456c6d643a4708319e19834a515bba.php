<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo $__env->yieldContent('title', config('app.name', 'Laravel')); ?></title>

        <?php echo $__env->yieldContent('meta-description'); ?>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <?php echo $__env->yieldContent('styles'); ?>

        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <?php if (! empty(trim($__env->yieldContent('header')))): ?>
                <header class="bg-white shadow-sm border-b">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <?php echo $__env->yieldContent('header'); ?>
                    </div>
                </header>
            <?php endif; ?>

            <?php if (! empty(trim($__env->yieldContent('breadcrumb')))): ?>
                <nav class="bg-white border-b">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
                        <?php echo $__env->yieldContent('breadcrumb'); ?>
                    </div>
                </nav>
            <?php endif; ?>

            <main class="<?php echo $__env->yieldContent('main-class', 'py-12'); ?>">
                <?php echo $__env->yieldContent('content'); ?>
            </main>

            <?php if (! empty(trim($__env->yieldContent('footer')))): ?>
                <footer class="bg-gray-800 text-white mt-auto">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <?php echo $__env->yieldContent('footer'); ?>
                    </div>
                </footer>
            <?php endif; ?>
        </div>

        <?php echo $__env->yieldContent('scripts'); ?>
    </body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/auth/resources/views/layouts/app.blade.php ENDPATH**/ ?>