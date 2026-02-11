<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Delete Account
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
        </p>
    </header>

    <button onclick="document.getElementById('confirm-user-deletion').classList.remove('hidden')" 
            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
        Delete Account
    </button>

    <div id="confirm-user-deletion" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <form method="post" action="<?php echo e(route('profile.destroy')); ?>" class="p-6">
                <?php echo csrf_field(); ?>
                <?php echo method_field('delete'); ?>

                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure you want to delete your account?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                </p>

                <div class="mt-6">
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password" type="password" class="mt-1 block w-3/4 px-3 py-2 border border-gray-300 rounded-md" placeholder="Password">
                <?php if($errors->userDeletion->has('password')): ?>
                    <div class="mt-2 text-sm text-red-600"><?php echo e($errors->userDeletion->first('password')); ?></div>
                <?php endif; ?>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button" onclick="document.getElementById('confirm-user-deletion').classList.add('hidden')" 
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 mr-3">
                    Cancel
                </button>

                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                    Delete Account
                </button>
            </div>
        </form>
    </div>
</section>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/auth/resources/views/profile/partials/delete-user-form.blade.php ENDPATH**/ ?>