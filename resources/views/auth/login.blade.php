<x-layout>

    <div>
        <x-form.layout action="{{ route('login.store') }}">
            <x-form.container>
                    
                <div>
                    <x-form.label for="email">
                        Email
                    </x-form.lform-abel>
                    <x-form.input
                        type="email"
                        name="email"
                        id="email"
                        :value="old('email')"
                        placeholder="Email..."
                        required/>
                    <x-form.error errorFor="email" />
                </div>

                <div>
                    <x-form.label for="password">
                        Password
                    </x-form.label>
                    <x-form.input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Password..."
                        required/>
                    <x-form.error errorFor="password" />
                </div>

                <a href="{{ route('register') }}">Belum punya akun?</a>

                <x-form.button-container>
                    <x-form.button-link href="{{ url('/') }}">Batal</x-form.button-link>
                    <x-form.button type="submit">Login</x-form.button>
                </x-form.button-container>

            </x-form.container>
        </x-form.layout>
    </div>

</x-layout>