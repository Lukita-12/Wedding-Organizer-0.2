<x-layout>

    <div>
        <x-form.form-layout action="">

            <div>
                <x-form.form-label for=username>
                    Username
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="Username"
                    />
                <x-form.form-error errorFor="username" />
            </div>

            <div>
                <x-form.form-label for=email>
                    Email
                </x-form.form-label>
                <x-form.form-input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Email..."
                    />
                <x-form.form-error errorFor="email" />
            </div>

            <div>
                <x-form.form-label for=password>
                    Password
                </x-form.form-label>
                <x-form.form-input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Password..."
                    />
                <x-form.form-error errorFor="password" />
            </div>

            <div>
                <x-form.form-label for=password_confirmation>
                    Confirm password
                </x-form.form-label>
                <x-form.form-input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    placeholder="Confirm password..."
                    />
                <x-form.form-error errorFor="password_confirmation" />
            </div>

            <div>
                <a href="{{ url('/') }}">Batal</a>
                <button type="submit">SigIn</button>
            </div>

        </x-form.form-layout>
    </div>

</x-layout>