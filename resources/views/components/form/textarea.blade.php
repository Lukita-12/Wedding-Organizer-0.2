<textarea {{ $attributes->merge(['class' => 'w-full poppins bg-slate-100 text-slate-700 text-lg px-3 py-1 resize-none', 'rows' => '4']) }}>
    {{ $slot }}
</textarea>