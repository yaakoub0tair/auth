<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title' => 'Statistique',
    'value' => '0',
    'icon' => null,
    'color' => 'blue',
    'trend' => null,
    'trendValue' => null
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'title' => 'Statistique',
    'value' => '0',
    'icon' => null,
    'color' => 'blue',
    'trend' => null,
    'trendValue' => null
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $colorClasses = [
        'blue' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-600'],
        'green' => ['bg' => 'bg-green-100', 'text' => 'text-green-600'],
        'yellow' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-600'],
        'red' => ['bg' => 'bg-red-100', 'text' => 'text-red-600'],
        'purple' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-600'],
        'indigo' => ['bg' => 'bg-indigo-100', 'text' => 'text-indigo-600']
    ];

    $currentColor = $colorClasses[$color] ?? $colorClasses['blue'];
?>

<div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-md transition-shadow duration-200">
    <div class="p-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <!-- Icône -->
                <div class="flex-shrink-0 <?php echo e($currentColor['bg']); ?> rounded-md p-3">
                    <?php if($icon): ?>
                        <?php echo $icon; ?>

                    <?php else: ?>
                        <svg class="h-6 w-6 <?php echo e($currentColor['text']); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    <?php endif; ?>
                </div>
                
                <!-- Contenu -->
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate"><?php echo e($title); ?></dt>
                        <dd class="text-lg font-medium text-gray-900"><?php echo e($value); ?></dd>
                    </dl>
                </div>
            </div>

            <!-- Tendance (optionnel) -->
            <?php if($trend && $trendValue): ?>
                <div class="flex items-center <?php echo e($trend === 'up' ? 'text-green-600' : 'text-red-600'); ?>">
                    <svg class="h-4 w-4 <?php echo e($trend === 'up' ? 'transform rotate-180' : ''); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>
                    <span class="ml-1 text-sm font-medium"><?php echo e($trendValue); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/auth/resources/views/components/stat-card.blade.php ENDPATH**/ ?>