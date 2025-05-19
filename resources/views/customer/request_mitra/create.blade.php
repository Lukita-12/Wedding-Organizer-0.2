<x-layout>
      
    <x-form.container variant="main">
        @unless ($hasPelanggan)
            <div class="flex flex-col items-center gap-4">
                <span class="w-md poppins-medium text-slate-700 text-center text-xl">Informasi pelanggan diperlukan sebelum membuat kerjasama!</span>
                <span class="my-1"></span>
                <a href="{{ route('customer.pelanggan.create') }}" class="w-2xs poppins-semibold bg-teal-500 text-slate-100 text-center text-lg px-3 py-1 transition delay-50 duration-300 hover:bg-teal-700">
                    + Buat
                </a>
                <span class="w-full border-2 border-slate-700 border-dashed"></span>
            </div>
        @endunless

        <x-form.form action="{{ route('customer.request_mitra.store') }}">
            <fieldset {{ !$hasPelanggan ? 'disabled' : '' }} class="{{ !$hasPelanggan ? 'opacity-50' : '' }} py-4">
                <x-form.container variant="form">
                    <div>
                        <div class="flex justify-between">
                            <x-form.label for="pelanggan">Pelanggan</x-form.label>
                            <a href="{{ route('customer.pelanggan.create') }}" class="poppins-medium text-slate-700 text-lg px-3 py-1 transition delay-50 duration:300 hover:text-teal-500">+ Baru</a>
                        </div>
                        <x-form.select name="pelanggan_id" id="pelanggan_id" required>
                            <option value="">Pilih pelanggan</option>
                            @foreach ($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id }}" {{ (string) old('pelanggan_id') === (string) $pelanggan->id ? 'selected' : ''}}>
                                    {{ $pelanggan->nama_pelanggan }}
                                </option>
                            @endforeach
                        </x-form.select>
                        <x-form.error errorFor="pelanggan_id" />
                    </div>
    
                    <div>
                        <x-form.label for="nama_usaha">Nama Usaha</x-form.label>
                        <x-form.input type="text" name="nama_usaha" id="nama_usaha" placeholder="Nama usaha" />
                        <x-form.error errorFor="nama_usaha" />
                    </div>
    
                    <div>
                        <x-form.label for="jenis_usaha">Jenis Usaha</x-form.label>
                        <x-form.select name="jenis_usaha" id="jenis_usaha">
                            <option value="Venue"           {{ old('jenis_usaha') === 'Venue'           ? 'selected' : '' }}>Venue</option>
                            <option value="Dekorasi"        {{ old('jenis_usaha') === 'Dekorasi'        ? 'selected' : '' }}>Dekorasi</option>
                            <option value="Tata rias"       {{ old('jenis_usaha') === 'Tata rias'       ? 'selected' : '' }}>Tata rias</option>
                            <option value="Catering"        {{ old('jenis_usaha') === 'Catering'        ? 'selected' : '' }}>Catering</option>
                            <option value="Kue pernikahan"  {{ old('jenis_usaha') === 'Kue pernikahan'  ? 'selected' : '' }}>Kue pernikahan</option>
                            <option value="Fotografer"      {{ old('jenis_usaha') === 'Fotografer'      ? 'selected' : '' }}>Fotografer</option>
                            <option value="Entertainment"   {{ old('jenis_usaha') === 'Entertainment'   ? 'selected' : '' }}>Entertainment</option>
                        </x-form.select>
                        <x-form.error errorFor="jenis_usaha" />
                    </div>
    
                    <div>
                        <x-form.label for="nama_pemilik">Pemilik Usaha</x-form.label>
                        <x-form.input type="text" name="nama_pemilik" id="nama_pemilik" placeholder="Nama pemilik" />
                        <x-form.error errorFor="nama_pemilik" />
                    </div>
    
                    <x-form.container variant="button">
                        <x-form.link href="{{ route('customer.kerjasama.index') }}">Batal</x-form.link>
                        <x-form.button type="submit">Kirim</x-form.button>
                    </x-form.container>
                </x-form.container>
            </fieldset>
        </x-form.form>
    </x-form.container>

</x-layout>