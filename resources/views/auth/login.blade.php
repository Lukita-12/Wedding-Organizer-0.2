<x-layout>

    <div>
        <x-form.form-layout action="{{ route('login.store') }}">
            
            <div>
                <x-form.form-label for="email">
                    Email
                </x-form.lform-abel>
                <x-form.form-input
                    type="email"
                    name="email"
                    id="email"
                    :value="old('email')"
                    placeholder="Email..."
                    required/>
                <x-form.form-error errorFor="email" />
            </div>

            <div>
                <x-form.form-label for="password">
                    Password
                </x-form.form-label>
                <x-form.form-input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Password..."
                    required/>
                <x-form.form-error errorFor="password" />
            </div>

            <div>
                <a href="{{ route('register') }}">Belum punya akun?</a>
                <a href="{{ url('/') }}">Batal</a>
                <button type="submit">Login</button>
            </div>

        </x-form.form-layout>
    </div>

</x-layout>