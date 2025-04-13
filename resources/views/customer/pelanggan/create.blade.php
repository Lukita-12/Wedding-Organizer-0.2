<x-layout>

    <div>
        <x-form.form-layout action="{{ route('customer.pelanggan.store') }}">
            <x-form.form-container>

                <div>
                    <x-form.form-label for="nama_lengkap">
                        Nama lengkap
                    </x-form.form-label>
                    <x-form.form-input type="text"
                        name="nama_pelanggan" id="nama_pelanggan"
                        :value="old('nama_pelanggan')" placeholder="Nama lengkap..."
                        required />
                    <x-form.form-error errorFor="nama_pelanggan" />
                </div>

                <div>
                    <x-form.form-label for="jk_pelanggan">
                        Jenis kelamin
                    </x-form.form-label>
                    <x-form.form-select
                        name="jk_pelanggan" id="jk_pelanggan"
                        required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </x-form.form-select>
                    <x-form.form-error errorFor="jk_pelanggan" />
                </div>

                <div>
                    <x-form.form-label for="noTelp_pelanggan">
                        No. Telpon/WA
                    </x-form.form-label>
                    <x-form.form-input type="text"
                        name="noTelp_pelanggan" id="noTelp_pelanggan"
                        :value="old('noTelp_pelanggan')" placeholder="No. Telpon/WA..."
                        required />
                    <x-form.form-error errorFor="noTelp_pelanggan" />
                </div>

                <div>
                    <x-form.form-label for="email_pelanggan">
                        Email
                    </x-form.form-label>
                    @auth
                    <x-form.form-input type="email"
                        name="email_pelanggan" id="email_pelanggan"
                        value="{{ Auth::user()->email }}" placeholder="Email..."
                        required />
                    @else
                    <x-form.form-input type="email"
                        name="email_pelanggan" id="email_pelanggan"
                        value="{{ Auth::user()->email }}" placeholder="Email..."
                        required />
                    @endauth
                    <x-form.form-error errorFor="email_pelanggan" />
                </div>

                <div>
                    <x-form.form-label for="alamat_pelanggan">
                        Alamat
                    </x-form.form-label>
                    <x-form.form-textarea type="text"
                        name="alamat_pelanggan" id="alamat_pelanggan"
                        rows="4"
                        :value="old('alamat_pelanggan')" placeholder="Alamat..."
                        required />
                    <x-form.form-error errorFor="alamat_pelanggan" />
                </div>
                
                <div class="flex gap-3 justify-end">
                    <x-form.form-button-link href="{{ url('/') }}">
                        Batal
                    </x-form.form-button-link>
                    <x-form.form-button>
                        Simpan
                    </x-form.form-button>
                </div>

            </x-form.form-container>
        </x-form.form-layout>
    </div>

</x-layout>