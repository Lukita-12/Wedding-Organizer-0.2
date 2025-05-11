@props(['variant' => 'default'])
@php
    $button = match($variant) {
        default     => '',
        'delete'    => 'inter-medium bg-red-500 text-slate-100 text-sm px-3 py-1 hover:bg-red-600',
    }
@endphp

<button {{ $attributes->merge(['class' => "$button"]) }}>
    {{ $slot }}
</button>