<a {{ $attributes->merge(['class' => 'inline-block border-2 border-red-500 px-3 py-1 poppins-semibold text-center text-lg text-red-500 rounded-md transition duration:300 hover:bg-red-500 hover:text-slate-100 hover:ring-2 hover:ring-offset-2 hover:ring-red-500']) }}>
    {{ $slot }}
</a>