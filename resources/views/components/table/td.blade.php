@props(['variant' => 'default'])

@php

@endphp

<td {{ $attributes->merge(['class' => 'px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap']) }}>
    {{ $slot }}
</td>