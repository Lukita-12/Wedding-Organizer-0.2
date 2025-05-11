@props(['variant' => 'default'])
@php
    $link = match($variant) {
        default     => '',
        'create'    => 'poppins-medium bg-teal-500 text-slate-100 px-3 py-1 transition delay-50 duration:300 hover:bg-teal-600',
        'edit'      => 'inter-medium inline-block bg-green-500 text-slate-100 text-sm px-3 py-1 transition delay-50 duration:300 hover:bg-green-600',
    }
@endphp

<a {{ $attributes->merge(['class' => "$link"]) }}>
    {{ $slot }}
</a>