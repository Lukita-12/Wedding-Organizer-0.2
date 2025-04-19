<x-layout>
    
    <div>
        <h1>Permintaan kerjasama</h1>
    </div>

    <div>
        @unless ($hasPelanggan)
            <div>
                <p>Informasi pelanggan perlu diisikan sebelum mengajukan permintaan kerjasama</p>
                <a href="{{ route('customer.pelanggan.create') }}">
                    Buat informasi pelanggan
                </a>
            </div>
        @endunless

        <x-form.form action="{{ route('customer.request_mitra.store') }}">
            <x-container.form-fill>
                <x-container.label-input>
                    <x-form.label for="pelanggan_id">Nama Pelanggan</x-form.label>
                    <x-form.select type="text" name="pelanggan_id" id="pelanggan_id">
                        @foreach ($pelanggans as $pelanggan)
                            <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
                        @endforeach
                    </x-form.select>
                    <x-form.error errorFor="jenis_usaha" />
                </x-container.label-input>

                <x-container.label-input>
                    <x-form.label for="nama_usaha">Nama Usaha</x-form.label>
                    <x-form.input type="text" name="nama_usaha" id="nama_usaha" placeholder="Nama usaha" />
                    <x-form.error errorFor="nama_usaha" />
                </x-container.label-input>

                <x-container.label-input>
                    <x-form.label for="jenis_usaha">Jenis Usaha</x-form.label>
                    <x-form.select type="text" name="jenis_usaha" id="jenis_usaha">
                        <option value="Dekorasi">Dekorasi</option>
                        <option value="Tata rias">Tata rias</option>
                        <option value="Kue pernikahan">Kue pernikahan</option>
                    </x-form.select>
                    <x-form.error errorFor="jenis_usaha" />
                </x-container.label-input>

                <x-container.label-input>
                    <x-form.label for="nama_pemilik">Pemilik Usaha</x-form.label>
                    <x-form.input type="text" name="nama_pemilik" id="nama_pemilik" placeholder="Nama pemilik" />
                    <x-form.error errorFor="nama_pemilik" />
                </x-container.label-input>

                <x-container.form-button>
                    <x-form.button-link href="{{ url('/kerjasama') }}" class="w-1/8">Batal</x-form.button-link>
                    <x-form.button type="submit" class="w-1/8">Simpan</x-form.button>
                </x-container.form-button>
            </x-container.form-fill>
        </x-form.form>

</x-layout>