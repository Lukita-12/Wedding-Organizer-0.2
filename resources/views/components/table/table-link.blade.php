@props(['variant' => 'default'])
@php
    $link = match($variant) {
        default => '',
        'link'  => 'inline-block inter-italic text-slate-700 text-center italic underline',
    }
@endphp

<a {{ $attributes->merge(['class' => "$link"]) }}>
    {{ $slot }}
</a>