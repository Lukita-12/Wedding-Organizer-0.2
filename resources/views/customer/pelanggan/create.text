<x-layout>

    <div>
        <x-form.layout action="{{ route('customer.pelanggan.store') }}">
            <x-form.container>

                <div>
                    <x-form.label for="nama_lengkap">
                        Nama lengkap
                    </x-form.label>
                    <x-form.input type="text"
                        name="nama_pelanggan" id="nama_pelanggan"
                        :value="old('nama_pelanggan')" placeholder="Nama lengkap..."
                        required />
                    <x-form.error errorFor="nama_pelanggan" />
                </div>

                <div>
                    <x-form.label for="jk_pelanggan">
                        Jenis kelamin
                    </x-form.label>
                    <x-form.select
                        name="jk_pelanggan" id="jk_pelanggan"
                        required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </x-form.select>
                    <x-form.error errorFor="jk_pelanggan" />
                </div>

                <div>
                    <x-form.label for="noTelp_pelanggan">
                        No. Telpon/WA
                    </x-form.label>
                    <x-form.input type="text"
                        name="noTelp_pelanggan" id="noTelp_pelanggan"
                        :value="old('noTelp_pelanggan')" placeholder="No. Telpon/WA..."
                        required />
                    <x-form.error errorFor="noTelp_pelanggan" />
                </div>

                <div>
                    <x-form.label for="email_pelanggan">
                        Email
                    </x-form.label>
                    @auth
                    <x-form.input type="email"
                        name="email_pelanggan" id="email_pelanggan"
                        value="{{ Auth::user()->email }}" placeholder="Email..."
                        required />
                    @else
                    <x-form.input type="email"
                        name="email_pelanggan" id="email_pelanggan"
                        value="{{ Auth::user()->email }}" placeholder="Email..."
                        required />
                    @endauth
                    <x-form.error errorFor="email_pelanggan" />
                </div>

                <div>
                    <x-form.label for="alamat_pelanggan">
                        Alamat
                    </x-form.label>
                    <x-form.textarea type="text"
                        name="alamat_pelanggan" id="alamat_pelanggan"
                        rows="4"
                        :value="old('alamat_pelanggan')" placeholder="Alamat..."
                        required />
                    <x-form.error errorFor="alamat_pelanggan" />
                </div>
                
                <x-form.button-container>
                    <x-form.button-link href="{{ url('/') }}">
                        Batal
                    </x-form.button-link>
                    <x-form.button>
                        Simpan
                    </x-form.button>
                </x-form.button-container>

            </x-form.container>
        </x-form.layout>
    </div>

</x-layout>