@props(['variant' => 'default'])
@php
    $span = match($variant) {
        default => 'poppins-semibold text-slate-700 text-2xl',
    }
@endphp

<span {{ $attributes->merge(['class' => "$span"]) }}>
    {{ $slot }}
</span>