<form method="GET" action="{{ url()->current() }}">
    <input type="text"
        name="{{ $name }}"
        value="{{ request($name) }}" placeholder="Search..."
        class="border border border-dashed border-gray-700
            px-4 py-1 inter rounded-full">
        <button type="submit" class="bg-gray-700 text-white
            px-3 py-1 inter rounded-full">Cari</button>
</form>
