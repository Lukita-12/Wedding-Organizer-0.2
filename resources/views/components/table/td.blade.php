@props(['variant' => 'default'])
@php
    $tdClass = match($variant) {
        default     => 'poppins text-slate-700 text-center px-12 py-3 whitespace-nowrap',
        'heading'   => 'poppins-semibold text-slate-700 text-center text-lg px-12 py-2 whitespace-nowrap',
    }
@endphp

<td {{ $attributes->merge(['class' => "$tdClass"]) }}>
    {{ $slot }}
</td>