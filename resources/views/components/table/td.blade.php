@props(['variant' => 'default'])
@php
    $tableData = match($variant) {
        default => 'poppins text-slate-700 text-center px-12 py-2 whitespace-nowrap',
        'head'  => 'poppins-semibold text-slate-700 text-center text-lg px-12 py-2 whitespace-nowrap',
    }
@endphp

<td {{ $attributes->merge(['class' => "$tableData"]) }}>
    {{ $slot }}
</td>