@props(['variant' => 'default'])
@php
    $tdClass = match($variant) {
        default => 'poppins text-slate-700 text-center px-12 py-3 whitespace-nowrap',
        'head'  => 'poppins-semibold text-slate-700 text-center text-lg px-12 py-2 whitespace-nowrap',
        
        'head-report' => 'border text-center px-2 py-1',
        'body-report' => 'border text-center px-2 py-1'
    }
@endphp

<td {{ $attributes->merge(['class' => "$tdClass"]) }}>
    {{ $slot }}
</td>