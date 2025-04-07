<x-layout>
    
    <div>
        <h1>Permintaan kerjasama</h1>
    </div>

    <div>
        @unless ($hasCustomer)
            <div>
                <p>Informasi pelanggan perlu diisikan sebelum mengajukan permintaan kerjasama</p>
                <a href="{{ route('customer.pelanggan.create') }}">
                    Buat informasi pelanggan
                </a>
            </div>
        @endunless
        <x-form.form-layout action="{{ route('customer.request_mitra.store') }}">
            <fieldset {{ !$hasCustomer ? 'disabled' : '' }} class="{{ !$hasCustomer ? 'opacity-50' : '' }}">

                <div>
                    <x-form.form-label for="pelanggan">
                            Informasi pelanggan
                        </x-form.form-label>
                    <x-form.form-select
                        name="pelanggan_id" id="pelanggan_id"
                        required>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->nama_pelanggan }}</option>
                        @endforeach
                    </x-form.form-select>
                </div>

                <div>
                    <x-form.form-label for="nama_usaha">
                        Nama usaha
                    </x-form.form-label>
                    <x-form.form-input type="text"
                        name="nama_usaha" id="nama_usaha"
                        :value="old('nama_usaha')" placeholder="Nama usaha..."
                        required />
                    <x-form.form-error errorFor="nama_usaha" />
                </div>

                <div>
                    <x-form.form-label for="jenis_usaha">
                        Jenis usaha
                    </x-form.form-label>
                    <x-form.form-select
                        name="jenis_usaha" id="jenis_usaha"
                        :value="old('jenis_usaha')"
                        required>
                        <option value="Dekorasi">Dekorasi</option>
                        <option value="Tata rias">Tata rias</option>
                        <option value="Kue pernikahan">Kue pernikahan</option>
                    </x-form.form-select>
                    <x-form.form-error errorFor="jenis_usaha" />
                </div>

                <div>
                    <x-form.form-label for="nama_pemilik">
                        Pemilik usaha
                    </x-form.form-label>
                    <x-form.form-input type="text"
                        name="nama_pemilik" id="nama_pemilik"
                        :value="old('nama_pemilik')" placeholder="Pemilik usaha..."
                        required />
                    <x-form.form-error errorFor="nama_pemilik" />
                </div>

                <div>
                    <a href="{{ url('/request-mitra') }}">Batal</a>
                    <button type="submit">Simpan</button>
                </div>

            </fieldset>
        </x-form.form-layout>
    </div>

</x-layout>