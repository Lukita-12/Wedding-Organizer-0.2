@props(['variant' => 'default'])
@php
    $cardLink = match($variant) {
        default => 'w-full',

        'small-card' => 'w-full bg-slate-200 flex justify-center items-center px-3 py-2 gap-3 shadow shadow-slate-700/80 transition delay-50 duration:300 hover:bg-slate-300',
    }
@endphp

<a {{ $attributes->merge(['class' => "$cardLink"]) }}>
    {{ $slot }}
</a>