<button {{ $attributes->merge(['class' => 'w-1/10 poppins-semibold bg-teal-500 text-slate-100 text-lg px-3 py-1 transition delay-50 duration:300 hover:bg-teal-700']) }}>
    {{ $slot }}
</button>