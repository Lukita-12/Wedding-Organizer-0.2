<x-layout>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.ulasan.store') }}">
            <x-form.container variant="form">
                <x-form.container>
                    <x-form.label for="user">User</x-form.label>
                    <x-form.select name="user_id" id="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ (string) old('user_id') === (string) $user->id ? 'selected' : '' }}>
                                {{ $user->name }},
                            </option>
                        @endforeach
                    </x-form.select>
                    <x-form.error errorFor="user" />
                </x-form.container>

                <x-form.container>
                    <x-form.label for="ulasan">Ulasan</x-form.label>
                    <x-form.textarea name="ulasan" id="ulasan">
                        {{ old('ulasan') }}
                    </x-form.textarea>
                    <x-form.error errorFor="ulasan" />
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.link href="{{ route('admin.ulasan.index') }}">Batal</x-form.button-link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.container>
            </x-form.container>
        </x-form.form>
    </x-form.container>

</x-layout>