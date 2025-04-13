<form method="GET" action="{{ url()->current() }}">

    <label for="{{ $name }}" class="inter">
        {{ $label }}
    </label>

    <select name="{{ $name }}" id="{{ $name }}"
        class="border border-dashed border-gray-700 px-3 py-1 inter rounded-full"
        onchange="this.form.submit()">
        <option value="">Semua</option>
        @foreach ($options as $option)
            <option value="{{ $option }}" @selected(request($name) === $option)>
                {{ $option }}
            </option>
        @endforeach
    </select>

</form>