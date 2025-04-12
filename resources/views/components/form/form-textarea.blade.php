<textarea {{ $attributes->merge(['class' => 'w-full border border-gray-300 px-3 py-2 rounded-xl focus:shadow-sm focus:shadow-cyan-500/50 focus:outline-none focus:border-teal-500/50 resize-none']) }}>
    {{ $slot }}
</textarea>