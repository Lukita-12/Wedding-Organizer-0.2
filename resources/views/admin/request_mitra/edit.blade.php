<x-layout-form>
    <x-slot:heading>
        PERMINTAAN KERJASAMA
    </x-slot:heading>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.request_mitra.update', $requestMitra) }}">
            @method('PUT')

            <x-form.container variant="form">
                <x-form.container>
                    <x-form.label for="pelanggan">Pelanggan</x-form.label>
                    <x-form.select name="pelanggan_id" id="pelanggan_id" required>
                        <option value="">Pilih pelanggan</option>
                        @foreach ($pelanggans as $pelanggan)
                            <option value="{{ $pelanggan->id }}" {{ (string) old('pelanggan_id', $requestMitra->pelanggan_id) === (string) $pelanggan->id ? 'selected' : ''}}>
                                {{ $pelanggan->nama_pelanggan }}
                            </option>
                        @endforeach
                    </x-form.select>
                    <x-form.error errorFor="pelanggan_id" />
                </x-form.container>

                <x-form.container>
                    <x-form.label for="nama_usaha">Nama Usaha</x-form.label>
                    <x-form.input type="text" name="nama_usaha" id="nama_usaha" :value="old('nama_usaha', $requestMitra->nama_usaha)" placeholder="Nama usaha" required />
                    <x-form.error errorFor="nama_usaha" />
                </x-form.container>
    
                <x-form.container>
                    <x-form.label for="jenis_usaha">Jenis Usaha</x-form.label>
                    <x-form.select name="jenis_usaha" id="jenis_usaha" required>
                        <option value="Venue" {{ old('jenis_usaha', $requestMitra->jenis_usaha) === 'Venue' ? 'selected' : '' }}>Venue</option>
                        <option value="Dekorasi" {{ old('jenis_usaha', $requestMitra->jenis_usaha) === 'Dekorasi' ? 'selected' : '' }}>Dekorasi</option>
                        <option value="Tata rias" {{ old('jenis_usaha', $requestMitra->jenis_usaha) === 'Tata rias' ? 'selected' : '' }}>Tata rias</option>
                        <option value="Catering" {{ old('jenis_usaha', $requestMitra->jenis_usaha) === 'Catering' ? 'selected' : '' }}>Catering</option>
                    </x-form.select>
                    <x-form.error errorFor="jenis_usaha" />
                </x-form.container>

                <x-form.container>
                    <x-form.label for="nama_pemilik">Nama Pemilik</x-form.label>
                    <x-form.input type="text" name="nama_pemilik" id="nama_pemilik" :value="old('nama_pemilik', $requestMitra->nama_pemilik)" placeholder="Nama pemilik" required />
                    <x-form.error errorFor="nama_pemilik" />
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.link href="{{ route('admin.request_mitra.index') }}">Batal</x-form.link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.container>
            </x-form.container>
        </x-form.form>
    </x-form.container>
</x-layout-form>