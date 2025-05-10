@props(['variant' => 'default'])
@php
    $tableRow = match($variant) {
        default => 'odd:bg-slate-100 even:bg-slate-200',
    }
@endphp

<tr {{ $attributes->merge(['class' => "$tableRow"]) }}>
    {{ $slot }}
</tr>