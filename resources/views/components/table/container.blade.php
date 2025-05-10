@props(['variant' => 'default'])
@php
    $container = match($variant) {
        default     => 'w-full bg-slate-200 flex flex-col shadow shadow-slate-700',
        'heading'   => 'w-full flex justify-between items-center px-4 py-1 border-b-2 border-slate-500',
        'table'     => 'w-full overflow-auto',
        'footer'    => 'w-full flex justify-center px-3 py-3',
    }
@endphp

<div {{ $attributes->merge(['class' => "$container"]) }}>
    {{ $slot }}
</div>