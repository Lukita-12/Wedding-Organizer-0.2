<x-layout>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.akun.store') }}">
            <x-form.container variant="form">
                <x-form.container>
                    <x-form.label for="name">Username</x-form.label>
                    <x-form.input type="text" name="name" id="name" placeholder="Username" :value="old('name')" required/>
                    <x-form.error errorFor="name" />
                </x-form.container>

                <x-form.container>
                    <x-form.label for="role">Role</x-form.label>
                    <x-form.select name="role" id="role">
                        <option value="customer" {{ old('role') === 'customer' ? 'selected' : '' }}>Customer</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    </x-form.select>
                    <x-form.error errorFor="role" />
                </x-form.container>

                <x-form.container>
                    <x-form.label for="email">Email</x-form.label>
                    <x-form.input type="email" name="email" id="email" placeholder="Email" :value="old('email')" required/>
                    <x-form.error errorFor="email" />
                </x-form.container>

                <x-form.container>
                    <x-form.label for="password">Password</x-form.label>
                    <x-form.input type="password" name="password" id="password" placeholder="Password" required/>
                    <x-form.error errorFor="password" />
                </x-form.container>

                <x-form.container>
                    <x-form.label for="konfirmasi_password">Konfirmasi Password</x-form.label>
                    <x-form.input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password" required/>
                    <x-form.error errorFor="password_confirmation" />
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.link href="{{ route('admin.akun.index') }}">Batal</x-form.button-link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.container>
            </x-form.container>
        </x-form.form>
    </x-form.container>

</x-layout>