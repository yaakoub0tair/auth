<?php $__env->startSection('title', 'Catégories'); ?>

<?php $__env->startSection('header', 'Catégories'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-lg shadow mb-6">
    <div class="p-6 border-b">
        <h2 class="text-lg font-semibold text-black">Ajouter une catégorie</h2>
    </div>
    <div class="p-6">
        <form action="<?php echo e(route('categories.store')); ?>" method="POST" class="flex gap-3">
            <?php echo csrf_field(); ?>
            <input type="text" name="name" placeholder="Nom de la catégorie..." 
                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            <button type="submit" class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800"
                style="background: black; color: white; padding: 8px 24px; border-radius: 8px; font-weight: 500; box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);">
                Ajouter
            </button>
        </form>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="p-6 border-b">
        <h2 class="text-lg font-semibold text-black">Liste des catégories (<?php echo e($categories->count()); ?>)</h2>
    </div>
    <div class="p-6">
        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg mb-3">
                <form action="<?php echo e(route('categories.update', $category)); ?>" method="POST" class="flex-1">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="text" name="name" value="<?php echo e($category->name); ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </form>
                
                <div class="flex items-center gap-3 ml-3">
                    <span class="text-sm text-gray-500"><?php echo e($category->links_count); ?> lien(s)</span>
                    <form action="<?php echo e(route('categories.destroy', $category)); ?>" method="POST" 
                          onsubmit="return confirm('Supprimer cette catégorie ?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700"
                        style="background: rgb(220 38 38); color: white; padding: 4px 12px; border-radius: 6px; font-weight: 500; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-gray-500 text-center py-8">Aucune catégorie</p>
        <?php endif; ?>
    </div>
</div>

<?php if($categories->count() > 0): ?>
    <div class="bg-white rounded-lg shadow mt-6">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Statistiques</h3>
            <div class="grid grid-cols-3 gap-6 text-center">
                <div>
                    <p class="text-2xl font-bold text-blue-600"><?php echo e($categories->count()); ?></p>
                    <p class="text-sm text-gray-500">Catégories</p>
                </div>
                <div>
                    <p class="text-2xl font-bold text-green-600"><?php echo e($categories->sum('links_count')); ?></p>
                    <p class="text-sm text-gray-500">Liens totaux</p>
                </div>
                <div>
                    <p class="text-2xl font-bold text-purple-600"><?php echo e($categories->max('links_count') ?? 0); ?></p>
                    <p class="text-sm text-gray-500">Max par catégorie</p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-with-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/auth/resources/views/categories/index.blade.php ENDPATH**/ ?>