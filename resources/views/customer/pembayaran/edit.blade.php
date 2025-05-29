<x-layout-form>
    <x-slot:heading>
        PEMBAYARAN
    </x-slot:heading>

    <x-form.container variant="main">
        <x-form.form action="{{ route('customer.pembayaran.update', $pembayaran) }}" enctype="multipart/form-data">
            @method('PUT')

            <x-form.container variant="form">
                <div class="opacity-60">
                    <div>
                        <x-form.label for="pelanggan">Pelanggan</x-form.label>
                        <x-form.input name="" id="" value="{{ $pembayaran->pesanan->pelanggan->nama_pelanggan ?? '-' }}" disabled
                            class="bg-transparent text-teal-600 border-b-2 border-slate-500" />
                        <x-form.error errorFor="bayar_lunas" />
                    </div>
    
                    <div>
                        <x-form.label for="pelanggan">Paket Pernikahan</x-form.label>
                        <x-form.input name="" id="" value="{{ $pembayaran->paketPernikahan->nama_paket ?? '-' }}" disabled
                            class="bg-transparent text-teal-600 border-b-2 border-slate-500" />
                        <x-form.error errorFor="bayar_lunas" />
                    </div>
    
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <x-form.label for="no_hp">No Telpon/WA</x-form.label>
                            <x-form.input type="text" name="" id="" value="{{ $pembayaran->pesanan->pelanggan->noTelp_pelanggan }}" disabled
                                class="bg-transparent text-teal-600 border-b-2 border-slate-500" />
                            <x-form.error errorFor="bayar_dp" />
                        </div>
        
                        <div>
                            <x-form.label for="email">Status Pembayaran Lunas</x-form.label>
                            <x-form.input type="email" name="" id="" value="{{ $pembayaran->pesanan->pelanggan->email_pelanggan }}" disabled
                                class="bg-transparent text-teal-600 border-b-2 border-slate-500" />
                            <x-form.error errorFor="bayar_lunas" />
                        </div>
                    </div>
                </div>

                <span class="w-full border-2 border-teal-600 border-dashed my-4"></span>

                <div class="grid grid-cols-2 gap-3">
                    <x-form.input type="text" name="pesanan_id" id="pesanan_id" value="{{ $pembayaran->pesanan_id }}" class="hidden" />

                    <div>
                        <x-form.label for="bukti_pembayaran_dp">Bukti Pembayaran DP</x-form.label>
                        <x-form.input type="file" name="bukti_pembayaran_dp" id="bukti_pembayaran_dp" accept="image/*" class="hidden" onchange="handleFileUpload(event, 'preview-dp', 'bayar_dp')" />

                        <label for="bukti_pembayaran_dp">
                            @php
                                $buktiDP = $pembayaran->bukti_pembayaran_dp ?? null;
                            @endphp
                            <div class="h-40 flex flex-col justify-center items-center p-1 border-2 border-slate-500 border-dashed cursor-pointer overflow-hidden">
                                <img id="preview-dp" src="{{ $buktiDP ? asset('storage/' . $buktiDP) : '#' }}" alt="Preview DP"
                                    class="{{ $buktiDP ? 'object-contain h-full' : 'hidden object-contain h-full' }}">
                                <span class="poppins-medium bg-slate-100 w-full h-full flex justify-center items-center text-teal-600 text-center text-lg transition delay-50 duration-300 hover:bg-slate-300 {{ $buktiDP ? 'hidden' : '' }}">+ Tambah</span>
                            </div>
                        </label>
                        <x-form.error errorFor="bukti_pembayaran_dp" />
                    </div>
    
                    <div>
                        <x-form.label for="bukti_pembayaran_lunas">Bukti Pembayaran Lunas</x-form.label>
                        <x-form.input type="file" name="bukti_pembayaran_lunas" id="bukti_pembayaran_lunas" accept="image/*" class="hidden" onchange="handleFileUpload(event, 'preview-lunas', 'bayar_lunas')" />

                        <label for="bukti_pembayaran_lunas">
                            @php
                                $buktiLunas = $pembayaran->bukti_pembayaran_lunas ?? null;
                            @endphp
                            <div class="h-40 flex flex-col justify-center items-center p-1 border-2 border-slate-500 border-dashed cursor-pointer overflow-hidden">
                                <img id="preview-lunas" src="{{ $buktiLunas ? asset('storage/' . $buktiLunas) : '#' }}" alt="Preview Lunas"
                                    class="{{ $buktiLunas ? 'object-contain h-full' : 'hidden object-contain h-full' }}">
                                <span class="poppins-medium bg-slate-100 w-full h-full flex justify-center items-center text-teal-600 text-center text-lg transition delay-50 duration-300 hover:bg-slate-300 {{ $buktiLunas ? 'hidden' : '' }}">+ Tambah</span>
                            </div>
                        </label>
                        <x-form.error errorFor="bukti_pembayaran_lunas" />
                    </div>

                    <x-form.input type="text" name="bayar_dp" id="bayar_dp" value="Belum dibayar" class="hidden" />
                    <x-form.input type="text" name="bayar_lunas" id="bayar_lunas" value="Belum dibayar" class="hidden" />

                    <div>
                        <x-form.label for="status_pembayaran_dp">Status Pembayaran DP</x-form.label>
                        <x-form.input type="text" name="" id="" value="{{ $pembayaran->bayar_dp }}" disabled
                            class="bg-transparent text-teal-600 border-b-2 border-slate-500" />
                        <x-form.error errorFor="bayar_dp" />
                    </div>
    
                    <div>
                        <x-form.label for="status_pembayaran_lunas">Status Pembayaran Lunas</x-form.label>
                        <x-form.input name="" id="" value="{{ $pembayaran->bayar_lunas }}" disabled
                            class="bg-transparent text-teal-600 border-b-2 border-slate-500" />
                        <x-form.error errorFor="bayar_lunas" />
                    </div>
                </div>

                <div>
                    <x-form.label for="status_pembayaran_lunas">Transfer Bank:</x-form.label>

                    <div class="flex flex-col">
                        @foreach ($banks as $bank)
                            <span class="gapp-1 poppins-medium text-teal-700 text-lg px-3">
                                Bank: <span class="poppins text-slate-700">{{ $bank->nama_bank }}</span>
                            </span>
                            <span class="gapp-1 poppins-medium text-teal-700 text-lg px-3">
                                No. Rekening: <span class="poppins text-slate-700">{{ $bank->no_rekening }}</span>
                            </span>
                        @endforeach
                    </div>
                </div>

                <x-form.container variant="button">
                    <x-form.link href="{{ route('customer.pesanan.index') }}">Batal</x-form.link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.container>
            </x-form.container>
        </x-form.form>
    </x-form.container>
</x-layout-form>