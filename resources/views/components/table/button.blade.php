@props(['variant' => 'default'])
@php
    $button = match($variant) {
        default => '',
        'accept'=> 'inter-medium bg-blue-500 text-slate-100 text-sm px-3 py-1 transition delay-50 duration:300 hover:bg-blue-700',
        'reject'=> 'inter-medium bg-orange-500 text-slate-100 text-sm px-3 py-1 transition delay-50 duration:300 hover:bg-orange-700',
        'delete'=> 'inter-medium bg-red-500 text-slate-100 text-sm px-3 py-1 transition delay-50 duration:300 hover:bg-red-700',
    }
@endphp

<button {{ $attributes->merge(['class' => "$button"]) }}>
    {{ $slot }}
</button>