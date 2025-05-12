@props(['variant' => 'default'])
@php
    $container = match($variant) {
        default => '',
        'main'  => 'w-full bg-slate-200 shadow shadow-slate-500 px-4 py-2',
        'form'  => 'flex flex-col gap-3',
        'button'=> 'w-full flex justify-end gap-3',
    }
@endphp

<div {{ $attributes->merge(['class' => "$container"]) }}>{{ $slot }}</div>