<x-layout>
    <div class="flex flex-col items-center py-8">
        <span class="poppins-semibold text-teal-500 text-5xl text-center">PAKET PERNIKAHAN</span>
    </div>

    <div class="flex flex-col items-center">

        <div class="bg-slate-200 w-2/3 flex flex-col gap-3 p-3">
            <div class="grid grid-cols-3 gap-3">
                <div class="col-span-3">
                    <img src="{{ $paketPernikahan->upload_file ? asset('storage/' . $paketPernikahan->upload_file) : asset('images/flower.jpg') }}"
                        alt="Thumbnail" class="w-full h-84 object-cover object-center">
                </div>

                <div class="col-span-3">
                    <div class="flex justify-between items-center">
                        <h1 class="text-3xl font-semibold text-teal-700 mb-2">{{ $paketPernikahan->nama_paket }}</h1>
                        <p class="text-slate-600 mb-4">Status: 
                            <span class="poppins-medium px-2 py-1 bg-slate-300 text-teal-700 rounded">
                                {{ ucfirst($paketPernikahan->status_paket) }}
                            </span>
                        </p>
                    </div>
                </div>

                @php
                    $gambarDekorasi      = $paketPernikahan->dekorasiUsaha->gambarPromosi->first();
                    $gambarTataRias      = $paketPernikahan->tataRiasUsaha->gambarPromosi->first();
                    $gambarCatering      = $paketPernikahan->cateringUsaha->gambarPromosi->first();
                    $gambarKuePernikahan = $paketPernikahan->kuePernikahanUsaha->gambarPromosi->first();
                    $gambarFotografer    = $paketPernikahan->fotograferUsaha->gambarPromosi->first();
                    $gambarEntertainment = $paketPernikahan->entertainmentUsaha->gambarPromosi->first();
                @endphp

                <div class="bg-slate-100 flex flex-col rounded-sm shadow-lg">
                    @if ($gambarDekorasi)
                        <img src="{{ asset('storage/' . $gambarDekorasi->file_path) }}" alt="thumbnail" class="h-56 object-cover bg-center rounded-t-sm">
                    @else
                        <img src="{{ asset('images/flower.jpg') }}" alt="thumbnail" class="bg-cover bg-center rounded-t-sm">
                    @endif
                    
                    <div class="flex flex-col gap-2 px-2">
                        <span class="poppins-semibold text-teal-600 text-2xl">{{ $paketPernikahan->dekorasiUsaha->requestMitra->nama_usaha }}</span>
                        <span class="poppins-medium text-slate-600 text-end">{{ $paketPernikahan->ket_dekorasi }}</span>
                    </div>
                </div>

                <div class="bg-slate-100 flex flex-col rounded-sm shadow-lg">
                    @if ($gambarTataRias)
                        <img src="{{ asset('storage/' . $gambarTataRias->file_path) }}" alt="thumbnail" class="h-56 object-cover bg-center rounded-t-sm">
                    @else
                        <img src="{{ asset('images/flower.jpg') }}" alt="thumbnail" class="bg-cover bg-center rounded-t-sm">
                    @endif
                    
                    <div class="flex flex-col gap-2 px-2">
                        <span class="poppins-semibold text-teal-600 text-2xl">{{ $paketPernikahan->tataRiasUsaha->requestMitra->nama_usaha }}</span>
                        <span class="poppins-medium text-slate-600 text-end">{{ $paketPernikahan->ket_tata_rias }}</span>
                    </div>
                </div>

                <div class="bg-slate-100 flex flex-col rounded-sm shadow-lg">
                    @if ($gambarCatering)
                        <img src="{{ asset('storage/' . $gambarCatering->file_path) }}" alt="thumbnail" class="h-56 object-cover bg-center rounded-t-sm">
                    @else
                        <img src="{{ asset('images/flower.jpg') }}" alt="thumbnail" class="bg-cover bg-center rounded-t-sm">
                    @endif
                    
                    <div class="flex flex-col gap-2 px-2">
                        <span class="poppins-semibold text-teal-600 text-2xl">{{ $paketPernikahan->cateringUsaha->requestMitra->nama_usaha }}</span>
                        <span class="poppins-medium text-slate-600 text-end">{{ $paketPernikahan->ket_catering }}</span>
                    </div>
                </div>

                <div class="bg-slate-100 flex flex-col rounded-sm shadow-lg">
                    @if ($gambarKuePernikahan)
                        <img src="{{ asset('storage/' . $gambarKuePernikahan->file_path) }}" alt="thumbnail" class="h-56 object-cover bg-center rounded-t-sm">
                    @else
                        <img src="{{ asset('images/flower.jpg') }}" alt="thumbnail" class="bg-cover bg-center rounded-t-sm">
                    @endif
                    
                    <div class="flex flex-col gap-2 px-2">
                        <span class="poppins-semibold text-teal-600 text-2xl">{{ $paketPernikahan->kuePernikahanUsaha->requestMitra->nama_usaha }}</span>
                        <span class="poppins-medium text-slate-600 text-end">{{ $paketPernikahan->ket_kue_pernikahan }}</span>
                    </div>
                </div>

                <div class="bg-slate-100 flex flex-col rounded-sm shadow-lg">
                    @if ($gambarFotografer)
                        <img src="{{ asset('storage/' . $gambarFotografer->file_path) }}" alt="thumbnail" class="h-56 object-cover bg-center rounded-t-sm">
                    @else
                        <img src="{{ asset('images/flower.jpg') }}" alt="thumbnail" class="bg-cover bg-center rounded-t-sm">
                    @endif
                    
                    <div class="flex flex-col gap-2 px-2">
                        <span class="poppins-semibold text-teal-600 text-2xl">{{ $paketPernikahan->fotograferUsaha->requestMitra->nama_usaha }}</span>
                        <span class="poppins-medium text-slate-600 text-end">{{ $paketPernikahan->ket_fotografer }}</span>
                    </div>
                </div>

                <div class="bg-slate-100 flex flex-col rounded-sm shadow-lg">
                    @if ($gambarEntertainment)
                        <img src="{{ asset('storage/' . $gambarEntertainment->file_path) }}" alt="thumbnail" class="h-56 object-cover bg-center rounded-t-sm">
                    @else
                        <img src="{{ asset('images/flower.jpg') }}" alt="thumbnail" class="bg-cover bg-center rounded-t-sm">
                    @endif
                    
                    <div class="flex flex-col gap-2 px-2">
                        <span class="poppins-semibold text-teal-600 text-2xl">{{ $paketPernikahan->entertainmentUsaha->requestMitra->nama_usaha }}</span>
                        <span class="poppins-medium text-slate-600 text-end">{{ $paketPernikahan->ket_entertainment }}</span>
                    </div>
                </div>

                <!-- Button -->
                <div class="col-span-3 flex justify-end gap-3">
                    <!-- Tombol Kembali -->
                    <a href="{{ route('customer.paket_pernikahan.index') }}"
                        class="w-1/5 poppins-medium px-3 py-1 bg-red-500 text-slate-100 text-lg text-center rounded-sm hover:bg-red-700">
                            Kembali
                    </a>

                    <!-- Tombol Pesan -->
                    <a href="{{ route('customer.pesanan.create', ['paket_id' => $paketPernikahan->id]) }}" target="_blank"
                        class="w-1/5 poppins-medium px-3 py-1 bg-teal-500 text-slate-100 text-lg text-center rounded-sm hover:bg-teal-700">
                            Pesan
                    </a>
                </div>

            </div>
        </div>

    </div>
</x-layout>