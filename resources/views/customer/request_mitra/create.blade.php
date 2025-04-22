<x-layout>

    <div class="h-screen flex justify-center items-center">
        <div class="w-4xl flex flex-col bg-slate-200 px-3 py-5 rounded-xl shadow-md shadow-slate-500/80">
            <h1 class="poppins-semibold text-teal-500 text-3xl text-center">Permintaan Kerjasama<span class="text-white text-5xl">.</span></h1>
            <span class="my-4"></span>
    
            @unless ($hasPelanggan)
                <div class="flex flex-col gap-2 px-4 items-center">
                    <span class="poppins-medium text-slate-700">Informasi "pelanggan" diperlukan untuk mengajukan permintaan kerjasama!</span>
                    <span class="">
                        <a href="{{ route('customer.pelanggan.create') }}"
                            class="w-fit px-3 py-1 inline-block poppins-semibold text-sm text-teal-500 text-center border-2 border-teal-500 rounded-full transition duration-250 hover:bg-teal-500 hover:text-slate-100 hover:ring-2 hover:ring-offset-2 hover:ring-teal-500">
                            Buat baru >
                        </a>
                    </span>
                </div>
    
                <span class="border-2 border-dashed border-slate-600 my-6"></span>
            @endunless
    
            <x-form.form action="{{ route('customer.request_mitra.store') }}"> 
                <fieldset {{ !$hasPelanggan ? 'disabled' : '' }} class="{{ !$hasPelanggan ? 'opacity-50' : '' }}">
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
                </fieldset>
            </x-form.form>
        </div>
    </div>

</x-layout>