@props(['variant' => 'default'])
@php
    $span = match($variant) {
        default => '',

        'small-icon'    => 'text-slate-700 text-6xl text-center',
        'small-title'   => 'poppins-semibold text-slate-700 text-xl',
        'small-number'  => 'poppins-semibold text-slate-700 text-2xl',
    }
@endphp

<span {{ $attributes->merge(['class' => "$span"]) }}>
    {{ $slot }}
</span>