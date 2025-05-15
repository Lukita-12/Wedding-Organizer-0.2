@props(['action'])

<form action="{{ $action }}">
    @csrf
    <div class="flex items-center gap-1">
        <label for="filter_status" class="poppins-medium text-slate-700">Filter status:</label>
        <select {{ $attributes->merge(['class' => 'poppins text-teal-500 outline-none transition delay-50 hover:ring-2 hover:ring-teal-500', 'onchange' => 'this.form.submit()']) }}>
            {{ $slot }}
        </select>
    </div>
</form>