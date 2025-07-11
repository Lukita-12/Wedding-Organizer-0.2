<x-layout>
    <div class="flex flex-col items-center py-6">

        <div class="w-2/4 bg-slate-200 grid grid-cols-2 gap-4 p-4 rounded-lg shadow-lg">
            <!-- Gambar Thumbnail -->
            <div class="col-span-2">
                <img src="{{ $paketPernikahan->upload_file ? asset('storage/' . $paketPernikahan->upload_file) : asset('images/winter.jpg') }}"
                    alt="thumbnail"
                    class="w-full h-72 object-cover rounded-lg shadow">
            </div>

            <!-- Detail Paket -->
            <div class="col-span-2">
                <h1 class="text-2xl font-semibold text-slate-800 mb-2">{{ $paketPernikahan->nama_paket }}</h1>
                <p class="text-slate-600 mb-4">Status: 
                    <span class="px-2 py-1 bg-slate-300 rounded">
                        {{ ucfirst($paketPernikahan->status_paket) }}
                    </span>
                </p>
            </div>

            <!-- List Vendor -->
            <div class="bg-slate-100 rounded shadow">
                <img src="{{ asset('images/winter.jpg') }}" alt="paket thumbnail" class="rounded-t-sm">
                <div class="px-3 py-1">
                    <h2 class="poppins-semibold text-xl text-teal-500 mb-1">Venue</h2>
                    
                    <p class="poppins-medium text-md text-end text-slate-700">
                        @if($paketPernikahan->venue_ket_harga && $paketPernikahan->venueUsaha)
                            {{ $paketPernikahan->venue_ket_harga === 'harga01' 
                                ? $paketPernikahan->venueUsaha->ket_harga01 
                                : $paketPernikahan->venueUsaha->ket_harga02 }}
                        @else
                            -
                        @endif
                    </p>
                </div>
            </div>

            <div class="bg-slate-100 rounded shadow">
                <img src="{{ asset('images/winter.jpg') }}" alt="paket thumbnail" class="rounded-t-sm">
                <div class="px-3 py-1">
                    <h2 class="poppins-semibold text-xl text-teal-500 mb-1">Dekorasi</h2>
                    
                    <p class="poppins-medium text-md text-end text-slate-700">
                        @if($paketPernikahan->dekorasi_ket_harga && $paketPernikahan->dekorasiUsaha)
                            {{ $paketPernikahan->dekorasi_ket_harga === 'harga01' 
                                ? $paketPernikahan->dekorasiUsaha->ket_harga01 
                                : $paketPernikahan->dekorasiUsaha->ket_harga02 }}
                        @else
                            -
                        @endif
                    </p>
                </div>
            </div>

            <div class="bg-slate-100 rounded shadow">
                <img src="{{ asset('images/winter.jpg') }}" alt="paket thumbnail" class="rounded-t-sm">
                <div class="px-3 py-1">
                    <h2 class="poppins-semibold text-xl text-teal-500 mb-1">Tata Rias</h2>
                    
                    <p class="poppins-medium text-md text-end text-slate-700">
                        @if($paketPernikahan->tata_rias_ket_harga && $paketPernikahan->tataRiasUsaha)
                            {{ $paketPernikahan->tata_rias_ket_harga === 'harga01' 
                                ? $paketPernikahan->tataRiasUsaha->ket_harga01 
                                : $paketPernikahan->tataRiasUsaha->ket_harga02 }}
                        @else
                            -
                        @endif
                    </p>
                </div>
            </div>

            <div class="bg-slate-100 rounded shadow">
                <img src="{{ asset('images/winter.jpg') }}" alt="paket thumbnail" class="rounded-t-sm">
                <div class="px-3 py-1">
                    <h2 class="poppins-semibold text-xl text-teal-500 mb-1">Catering</h2>
                    
                    <p class="poppins-medium text-md text-end text-slate-700">
                        @if($paketPernikahan->catering_ket_harga && $paketPernikahan->cateringUsaha)
                            {{ $paketPernikahan->catering_ket_harga === 'harga01' 
                                ? $paketPernikahan->cateringUsaha->ket_harga01 
                                : $paketPernikahan->cateringUsaha->ket_harga02 }}
                        @else
                            -
                        @endif
                    </p>
                </div>
            </div>

            <div class="bg-slate-100 rounded shadow">
                <img src="{{ asset('images/winter.jpg') }}" alt="paket thumbnail" class="rounded-t-sm">
                <div class="px-3 py-1">
                    <h2 class="poppins-semibold text-xl text-teal-500 mb-1">Kue Pernikahan</h2>
                    
                    <p class="poppins-medium text-md text-end text-slate-700">
                        @if($paketPernikahan->kue_pernikahan_ket_harga && $paketPernikahan->kuePernikahanUsaha)
                            {{ $paketPernikahan->kue_pernikahan_ket_harga === 'harga01' 
                                ? $paketPernikahan->kuePernikahanUsaha->ket_harga01 
                                : $paketPernikahan->kuePernikahanUsaha->ket_harga02 }}
                        @else
                            -
                        @endif
                    </p>
                </div>
            </div>

            <div class="bg-slate-100 rounded shadow">
                <img src="{{ asset('images/winter.jpg') }}" alt="paket thumbnail" class="rounded-t-sm">
                <div class="px-3 py-1">
                    <h2 class="poppins-semibold text-xl text-teal-500 mb-1">Fotografer</h2>
                    
                    <p class="poppins-medium text-md text-end text-slate-700">
                        @if($paketPernikahan->fotografer_ket_harga && $paketPernikahan->fotograferUsaha)
                            {{ $paketPernikahan->fotografer_ket_harga === 'harga01' 
                                ? $paketPernikahan->fotograferUsaha->ket_harga01 
                                : $paketPernikahan->fotograferUsaha->ket_harga02 }}
                        @else
                            -
                        @endif
                    </p>
                </div>
            </div>

            <div class="bg-slate-100 rounded shadow">
                <img src="{{ asset('images/winter.jpg') }}" alt="paket thumbnail" class="rounded-t-sm">
                <div class="px-3 py-1">
                    <h2 class="poppins-semibold text-xl text-teal-500 mb-1">Entertainment</h2>
                    
                    <p class="poppins-medium text-md text-end text-slate-700">
                        @if($paketPernikahan->entertainment_ket_harga && $paketPernikahan->entertainmentUsaha)
                            {{ $paketPernikahan->entertainment_ket_harga === 'harga01' 
                                ? $paketPernikahan->entertainmentUsaha->ket_harga01 
                                : $paketPernikahan->entertainmentUsaha->ket_harga02 }}
                        @else
                            -
                        @endif
                    </p>
                </div>
            </div>
            <!-- Harga -->
            <?php
            /*
            <div class="col-span-2 bg-slate-100 p-4 rounded shadow">
                <h2 class="font-semibold text-xl text-slate-800">Harga Paket</h2>
                <p class="text-slate-700 mt-2">DP: Rp{{ number_format($paketPernikahan->hargaDP_paket, 0, ',', '.') }}</p>
                <p class="text-slate-700">Pelunasan: Rp{{ number_format($paketPernikahan->hargaLunas_paket, 0, ',', '.') }}</p>
            </div>
            */
            ?>

            <div class="col-span-2 flex justify-end gap-3">
                <a href="{{ route('customer.paket_pernikahan.index') }}" class="w-1/5 poppins-medium px-3 py-1 bg-red-500 text-slate-100 text-lg text-center rounded-sm hover:bg-red-700">
                    Kembali
                </a>
            </div>
        </div>

    </div>
</x-layout>