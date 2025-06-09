@props(['variant' => 'default'])
@php
    $trClass = match($variant) {
        default => '',
        'body'  => 'odd:bg-slate-100 even:bg-slate-200 transition delay-50 duration:300 hover:bg-teal-500/20',

        'head-report' => 'font-bold h-[3rem] align-middle',
        'body-report' => 'text-sm h-[3rem] align-middle',
    }
@endphp

<tr {{ $attributes->merge(['class' => "$trClass"]) }}>
    {{ $slot }}
</tr>