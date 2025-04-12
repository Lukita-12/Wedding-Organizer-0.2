<select {{ $attributes->merge(['class' => 'w-full roboto border border-gray-300 px-3 py-2 rounded-full focus:shadow-sm focus:shadow-cyan-500/50 focus:outline-none focus:border-teal-500/50 resize-none']) }}>

    {{ $slot }}
    
</select>