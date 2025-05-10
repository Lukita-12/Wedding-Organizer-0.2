@props(['variant' => 'default'])
@php
    $container = match($variant) {
        default     => 'w-full',
        'content'   => 'w-full flex flex-col items-center gap-3',
    }
@endphp

<div {{ $attributes->merge(['class' => "$container"]) }}>
    {{ $slot }}
</div>