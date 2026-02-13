@props(['on'])

<div {{ $attributes->merge(['class' => 'text-sm text-gray-600']) }} x-show="{{ $on }}" x-transition>
    {{ $slot }}
</div>
