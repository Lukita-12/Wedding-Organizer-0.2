<x-layout>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.akun.update', $user) }}">
            <x-form.container variant="form">
                @method('PUT')

                <x-form.container>
                    <x-form.label for="name">Username</x-form.label>
                    <x-form.input type="text" name="name" id="name" placeholder="Username" :value="old('name', $user->name)" required/>
                    <x-form.error errorFor="name" />
                </x-form.container>

                <x-form.container>
                    <x-form.label for="role">Role</x-form.label>
                    <x-form.select name="role" id="role">
                        <option value="customer" {{ old('role', $user->role) === 'customer' ? 'selected' : '' }}>Customer</option>
                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                    </x-form.select>
                    <x-form.error errorFor="role" />
                </x-form.container>

                <x-form.container>
                    <x-form.label for="email">Email</x-form.label>
                    <x-form.input type="email" name="email" id="email" placeholder="Email" :value="old('email', $user->email)" required/>
                    <x-form.error errorFor="email" />
                </x-form.container>

                <span class="poppins-italic-medium text-red-500/80 text-lg text-center">- Isi hanya jika ingin mengubah password! -</span>
                <div class="flex flex-col border-2 border-teal-500 border-dashed px-3 py-3 gap-3">
                    <x-form.container>
                        <x-form.label for="password" class="text-teal-600!">Password</x-form.label>
                        <x-form.input type="password" name="password" id="password" placeholder="Password" />
                        <x-form.error errorFor="password" />
                    </x-form.container>
    
                    <x-form.container>
                        <x-form.label for="konfirmasi_password" class="text-teal-600!">Konfirmasi Password</x-form.label>
                        <x-form.input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password" />
                        <x-form.error errorFor="password_confirmation" />
                    </x-form.container>
                </div>

                <x-form.container variant="button">
                    <x-form.link href="{{ route('admin.akun.index') }}">Batal</x-form.button-link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.container>
            </x-form.container>
        </x-form.form>
    </x-form.container>

</x-layout>