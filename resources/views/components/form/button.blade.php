<button {{ $attributes->merge(['class' => 'bg-teal-500 px-3 px-1 poppins-semibold text-center text-slate-100 rounded-md transition duration:300 hover:ring-2 hover:ring-offset-2 hover:ring-teal-500']) }}>
    {{ $slot }}
</button>