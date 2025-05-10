@props(['variant' => 'default'])
@php
    $table = match($variant) {
        default => 'table-auto',
    }
@endphp

<table {{ $attributes->merge(['class' => "$table"]) }}>
    {{ $slot }}
</table>