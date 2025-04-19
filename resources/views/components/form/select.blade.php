<select {{ $attributes->merge(['class' => 'bg-slate-100 w-full px-4 py-2 inter text-lg text-slate-700 rounded-full focus:outline-none focus:ring-2 focus:ring-teal-500']) }}>
    {{ $slot }}
</select>