@props(['variant' => 'default'])
@php
    $trClass = match($variant) {
        default => '',
        'body'  => 'odd:bg-slate-100 even:bg-slate-200 transition delay-50 duration:300 hover:bg-teal-500/20',
    }
@endphp

<tr {{ $attributes->merge(['class' => "$trClass"]) }}>
    {{ $slot }}
</tr>