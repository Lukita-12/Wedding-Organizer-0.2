<x-layout>

    <div>
        <x-form.layout action="">
            <x-form.container>

                <div>
                    <x-form.label for=username>
                        Username
                    </x-form.label>
                    <x-form.input
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Username"
                        />
                    <x-form.error errorFor="username" />
                </div>

                <div>
                    <x-form.label for=email>
                        Email
                    </x-form.label>
                    <x-form.input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="Email..."
                        />
                    <x-form.error errorFor="email" />
                </div>

                <div>
                    <x-form.label for=password>
                        Password
                    </x-form.label>
                    <x-form.input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Password..."
                        />
                    <x-form.error errorFor="password" />
                </div>

                <div>
                    <x-form.label for=password_confirmation>
                        Confirm password
                    </x-form.label>
                    <x-form.input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        placeholder="Confirm password..."
                        />
                    <x-form.error errorFor="password_confirmation" />
                </div>

                <x-form.button-container>
                    <x-form.button-link href="{{ url('/') }}">Batal</x-form.button-link>
                    <x-form.button type="submit">SigIn</x-form.button>
                </x-form.button-container>

            </x-form.container>
        </x-form.layout>
    </div>

</x-layout>