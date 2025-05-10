@props(['variant' => 'default'])
@php
    $container = match($variant) {
        default => 'w-full',

        'small-main'    => 'flex gap-3',
        'small-content' => 'flex flex-col justify-center',
    }
@endphp

<div {{ $attributes->merge(['class' => "$container"]) }}>
    {{ $slot }}
</div>