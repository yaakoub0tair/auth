<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Update Password
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="<?php echo e(route('password.update')); ?>" class="mt-6 space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>

        <div>
            <label for="update_password_current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" autocomplete="current-password">
            <?php if($errors->updatePassword->has('current_password')): ?>
                <div class="mt-2 text-sm text-red-600"><?php echo e($errors->updatePassword->first('current_password')); ?></div>
            <?php endif; ?>
        </div>

        <div>
            <label for="update_password_password" class="block text-sm font-medium text-gray-700">New Password</label>
            <input id="update_password_password" name="password" type="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" autocomplete="new-password">
            <?php if($errors->updatePassword->has('password')): ?>
                <div class="mt-2 text-sm text-red-600"><?php echo e($errors->updatePassword->first('password')); ?></div>
            <?php endif; ?>
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" autocomplete="new-password">
            <?php if($errors->updatePassword->has('password_confirmation')): ?>
                <div class="mt-2 text-sm text-red-600"><?php echo e($errors->updatePassword->first('password_confirmation')); ?></div>
            <?php endif; ?>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="px-4 py-2 bg-black text-white rounded-md hover:bg-gray-800">Save</button>

            <?php if(session('status') === 'password-updated'): ?>
                <p class="text-sm text-gray-600">Saved.</p>
            <?php endif; ?>
        </div>
    </form>
</section>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/auth/resources/views/profile/partials/update-password-form.blade.php ENDPATH**/ ?>