<?php $__env->startSection('title', 'Liens'); ?>

<?php $__env->startSection('header', 'Liens'); ?>

<?php $__env->startSection('content'); ?>



<div class="bg-white rounded-lg shadow mb-6" id="add-link-form">
    <div class="p-6 border-b">
        <h2 class="text-lg font-semibold text-black">Ajouter un lien</h2>
    </div>
    <div class="p-6">
        <form action="<?php echo e(route('links.store')); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="title" placeholder="Titre..." 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-black" required>
                <input type="url" name="url" placeholder="URL..." 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-black" required>
            </div>
            <div class="flex gap-4">
                <select name="category_id" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-black" required>
                    <option value="">Choisir une catégorie</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <input type="text" name="tags" placeholder="Tags (séparés par des virgules)..." 
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-black">
            </div>
            <button type="submit" class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800 shadow-lg"
            style="background: black; color: white; padding: 8px 24px; border-radius: 8px; font-weight: 500; box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);">
                Ajouter le lien
            </button>
        </form>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="p-6 border-b">
        <h2 class="text-lg font-semibold text-black">Liste des liens (<?php echo e($links->count()); ?>)</h2>
    </div>
    <div class="p-6">
        <?php $__empty_1 = true; $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="border border-gray-200 rounded-lg p-4 mb-4">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h4 class="text-lg font-medium text-black"><?php echo e($link->title); ?></h4>
                        <a href="<?php echo e($link->url); ?>" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm">
                            <?php echo e($link->url); ?>

                        </a>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">
                                <?php echo e($link->category->name); ?>

                            </span>
                            <?php if($link->tags->count() > 0): ?>
                                <?php $__currentLoopData = $link->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">
                                        #<?php echo e($tag->name); ?>

                                    </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <span class="text-xs text-gray-500">
                                <?php echo e($link->created_at->diffForHumans()); ?>

                            </span>
                        </div>
                    </div>
                    
                    <div class="flex gap-2 ml-4">
                        <button onclick="document.getElementById('edit-<?php echo e($link->id); ?>').classList.toggle('hidden')" 
                                class="px-4 py-2 bg-black text-white text-sm rounded-md hover:bg-gray-800 font-medium"
                                style="background: black; color: white; padding: 8px 16px; border-radius: 6px; font-weight: 500; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
                            Modifier
                        </button>
                        <form action="<?php echo e(route('links.destroy', $link)); ?>" method="POST" 
                              onsubmit="return confirm('Supprimer ce lien ?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm rounded-md hover:bg-red-700 font-medium"
                                    style="background: rgb(220 38 38); color: white; padding: 8px 16px; border-radius: 6px; font-weight: 500; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
                
                <div id="edit-<?php echo e($link->id); ?>" class="hidden mt-4 pt-4 border-t">
                    <form action="<?php echo e(route('links.update', $link)); ?>" method="POST" class="space-y-3">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <input type="text" name="title" value="<?php echo e($link->title); ?>" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                            <input type="url" name="url" value="<?php echo e($link->url); ?>" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        </div>
                        <select name="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php echo e($link->category_id == $category->id ? 'selected' : ''); ?>>
                                    <?php echo e($category->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <input type="text" name="tags" value="<?php echo e($link->tags->pluck('name')->implode(', ')); ?>" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <div class="flex gap-2">
                            <button type="submit" class="px-4 py-2 bg-black text-white text-sm rounded-md hover:bg-gray-800 font-medium"
                                    style="background: black; color: white; padding: 8px 16px; border-radius: 6px; font-weight: 500; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
                                Enregistrer
                            </button>
                            <button type="button" onclick="document.getElementById('edit-<?php echo e($link->id); ?>').classList.add('hidden')" 
                                    class="px-4 py-2 bg-black text-white text-sm rounded-md hover:bg-gray-800 font-medium"
                                    style="background: black; color: white; padding: 8px 16px; border-radius: 6px; font-weight: 500; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
                                Annuler
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-gray-500 text-center py-8">Aucun lien</p>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-with-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/auth/resources/views/links/index.blade.php ENDPATH**/ ?>