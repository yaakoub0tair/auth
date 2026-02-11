<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <form method="POST" action="<?php echo e(route('register')); ?>">
        <?php echo csrf_field(); ?>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input id="name" class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md" type="text" name="name" value="<?php echo e(old('name')); ?>" required autofocus autocomplete="name">
            <?php if($errors->has('name')): ?>
                <div class="mt-2 text-sm text-red-600"><?php echo e($errors->first('name')); ?></div>
            <?php endif; ?>
        </div>

        <div class="mt-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md" type="email" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="username">
            <?php if($errors->has('email')): ?>
                <div class="mt-2 text-sm text-red-600"><?php echo e($errors->first('email')); ?></div>
            <?php endif; ?>
        </div>

        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md" type="password" name="password" required autocomplete="new-password">
            <?php if($errors->has('password')): ?>
                <div class="mt-2 text-sm text-red-600"><?php echo e($errors->first('password')); ?></div>
            <?php endif; ?>
        </div>

        <div class="mt-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input id="password_confirmation" class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md" type="password" name="password_confirmation" required autocomplete="new-password">
            <?php if($errors->has('password_confirmation')): ?>
                <div class="mt-2 text-sm text-red-600"><?php echo e($errors->first('password_confirmation')); ?></div>
            <?php endif; ?>
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="<?php echo e(route('login')); ?>">
                Already have an account? Log in
            </a>

            <?php if(Route::has('password.request')): ?>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="<?php echo e(route('password.request')); ?>">
                    Forgot your password?
                </a>
            <?php endif; ?>
        </div>

        <div class="mt-4">
            <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                Register
            </button>
        </div>
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/auth/resources/views/auth/register.blade.php ENDPATH**/ ?>