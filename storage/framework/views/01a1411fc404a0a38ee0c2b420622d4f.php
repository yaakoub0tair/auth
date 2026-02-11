<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('header', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-black">Catégories</h3>
        <p class="text-3xl font-bold text-blue-600"><?php echo e($stats['categories_count']); ?></p>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-black">Liens</h3>
        <p class="text-3xl font-bold text-green-600"><?php echo e($stats['links_count']); ?></p>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-black">Tags</h3>
        <p class="text-3xl font-bold text-purple-600"><?php echo e($stats['tags_count']); ?></p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b">
            <h2 class="text-lg font-semibold text-black">Derniers liens</h2>
        </div>
        <div class="p-6">
            <?php if($recentLinks->count() > 0): ?>
                <div class="space-y-4">
                    <?php $__currentLoopData = $recentLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="border-l-4 border-blue-500 pl-4">
                            <h4 class="font-medium"><?php echo e($link->title); ?></h4>
                            <p class="text-sm text-gray-600"><?php echo e($link->url); ?></p>
                            <p class="text-xs text-gray-500"><?php echo e($link->created_at->diffForHumans()); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p class="text-gray-500">Aucun lien ajouté</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b">
            <h2 class="text-lg font-semibold text-black">Catégories populaires</h2>
        </div>
        <div class="p-6">
            <?php if($topCategories->count() > 0): ?>
                <div class="space-y-3">
                    <?php $__currentLoopData = $topCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex justify-between items-center">
                            <span class="font-medium"><?php echo e($category->name); ?></span>
                            <span class="text-sm text-gray-500"><?php echo e($category->links_count); ?> liens</span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p class="text-gray-500">Aucune catégorie</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-with-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/auth/resources/views/dashboard.blade.php ENDPATH**/ ?>