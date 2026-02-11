<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Profile Information
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Update your account's profile information and email address.
        </p>
    </header>

    <form id="send-verification" method="post" action="<?php echo e(route('verification.send')); ?>">
        <?php echo csrf_field(); ?>
    </form>

    <form method="post" action="<?php echo e(route('profile.update')); ?>" class="mt-6 space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('patch'); ?>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input id="name" name="name" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" value="<?php echo e(old('name', $user->name)); ?>" required autofocus autocomplete="name">
            <?php if($errors->has('name')): ?>
                <div class="mt-2 text-sm text-red-600"><?php echo e($errors->first('name')); ?></div>
            <?php endif; ?>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" value="<?php echo e(old('email', $user->email)); ?>" required autocomplete="username">
            <?php if($errors->has('email')): ?>
                <div class="mt-2 text-sm text-red-600"><?php echo e($errors->first('email')); ?></div>
            <?php endif; ?>

            <?php if($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail()): ?>
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        Your email address is unverified.

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Click here to re-send the verification email.
                        </button>
                    </p>

                    <?php if(session('status') === 'verification-link-sent'): ?>
                        <p class="mt-2 font-medium text-sm text-green-600">
                            A new verification link has been sent to your email address.
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="px-4 py-2 bg-black text-white rounded-md hover:bg-gray-800">Save</button>

            <?php if(session('status') === 'profile-updated'): ?>
                <p class="text-sm text-gray-600">Saved.</p>
            <?php endif; ?>
        </div>
    </form>
</section>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/auth/resources/views/profile/partials/update-profile-information-form.blade.php ENDPATH**/ ?>