<x-layout>

    <x-form.container variant="main">
        <x-form.form method="POST" action="{{ route('customer.pelanggan.store') }}">
            <x-form.container variant="form">
                <div>
                    <x-form.label for="nama_pelanggan">Nama Pelanggan</x-form.label>
                    <x-form.input type="text" name="nama_pelanggan" id="nama_pelanggan" value="{{ old('nama_pelanggan') }}" placeholder="Nama lengkap" required />
                    <x-form.error errorFor="nama_pelanggan" />
                </div>

                <div>
                    <x-form.label for="jk_pelanggan">Jenis Kelamin</x-form.label>
                    <x-form.select name="jk_pelanggan" id="jk_pelanggan" required>
                        <option value="Laki-laki" {{ old('jk_pelanggan') === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jk_pelanggan') === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </x-form.select>
                    <x-form.error errorFor="jk_pelanggan" />
                </div>

                <div>
                    <x-form.label for="noTelp_pelanggan">No. Telpon/WA</x-form.label>
                    <x-form.input type="text" name="noTelp_pelanggan" id="noTelp_pelanggan" value="{{ old('noTelp_pelanggan') }}" placeholder="No. Telpon/WA" required />
                    <x-form.error errorFor="noTelp_pelanggan" />
                </div>

                <div>
                    <x-form.label for="email_pelanggan">Email</x-form.label>
                    <x-form.input type="email" name="email_pelanggan" id="email_pelanggan" value="{{ old('email_pelanggan') }}" placeholder="Email" required />
                    <x-form.error errorFor="email_pelanggan" />
                </div>

                <div>
                    <x-form.label for="alamat_pelanggan">Alamat</x-form.label>
                    <x-form.textarea name="alamat_pelanggan" id="alamat_pelanggan" placeholder="Alamat" required>
                        {{ old('alamat_pelanggan') }}
                    </x-form.textarea>
                    <x-form.error errorFor="alamat_pelanggan" />
                </div>

                <x-form.container variant="button">
                    <x-form.link href="{{ url()->previous() }}">Batal</x-form.link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.container>
            </x-form.container>
        </x-form.form>
    </x-form.container>

</x-layout>