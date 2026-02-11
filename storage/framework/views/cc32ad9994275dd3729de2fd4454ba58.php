<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Odin'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <div class="w-64 bg-white shadow-md">
            <div class="p-4">
                <h1 class="text-xl font-bold text-gray-800">Odin</h1>
            </div>
            <nav class="mt-4">
                <a href="<?php echo e(route('dashboard')); ?>" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 <?php echo e(request()->routeIs('dashboard') ? 'bg-gray-100' : ''); ?>">
                    Dashboard
                </a>
                <a href="<?php echo e(route('categories.index')); ?>" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 <?php echo e(request()->routeIs('categories.*') ? 'bg-gray-100' : ''); ?>">
                    Catégories
                </a>
                <a href="<?php echo e(route('links.index')); ?>" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 <?php echo e(request()->routeIs('links.*') ? 'bg-gray-100' : ''); ?>">
                    Liens
                </a>
                <a href="<?php echo e(route('profile.edit')); ?>" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 <?php echo e(request()->routeIs('profile.*') ? 'bg-gray-100' : ''); ?>">
                    Profil
                </a>
            </nav>
            <div class="absolute bottom-0 w-64 p-4 border-t">
                <div class="text-sm text-gray-600"><?php echo e(Auth::user()->name); ?></div>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="text-sm text-red-600 hover:text-red-800">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
        
        <div class="flex-1">
            <header class="bg-white shadow-sm">
                <div class="px-6 py-4">
                    <h1 class="text-2xl font-semibold text-gray-900"><?php echo $__env->yieldContent('header', 'Dashboard'); ?></h1>
                </div>
            </header>
            
            <main class="p-6">
                <?php if(session('success')): ?>
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                
                <?php if(session('error')): ?>
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>
                
                <?php if($errors->any()): ?>
                    <div class="mb-4 p-4 bg-yellow-100 text-yellow-700 rounded">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div><?php echo e($error); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>

        <?php echo $__env->yieldContent('scripts'); ?>
    </body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/auth/resources/views/layouts/app-with-sidebar.blade.php ENDPATH**/ ?>