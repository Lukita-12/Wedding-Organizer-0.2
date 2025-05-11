@props(['variant' => 'default'])
@php
    $container = match($variant) {
        default     => '',
        'main'      => 'w-full bg-slate-200 flex flex-col shadow shadow-slate-500',
        'heading'   => 'w-full flex justify-between items-center px-4 py-2 border-b-2 border-slate-500',
        'table'     => 'overflow-auto',
        'footing'   => 'px-4 py-3',
        'button'    => 'flex justify-center items-center gap-2',
    }
@endphp

<div {{ $attributes->merge(['class' => "$container"]) }}>
    {{ $slot }}
</div>