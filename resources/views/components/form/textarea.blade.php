<textarea {{ $attributes->merge(['class' => 'bg-slate-100 w-full px-4 py-1 inter text-slate-700 text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 resize-none', 'rows' => '4']) }}>
    {{ $slot }}
</textarea>