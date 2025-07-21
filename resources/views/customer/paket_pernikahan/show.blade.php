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
                    <div class="flex justify-between items-center px-3">
                        <div class="flex items-center gap-2">
                            <span class="bg-teal-600 w-3 h-3 rounded-full"></span>

                            <h1 class="text-3xl font-bold text-teal-700 mb-2">{{ $paketPernikahan->nama_paket }}</h1>
                        </div>
                        
                        <p class="text-slate-600 mb-4">Status: 
                            <span class="poppins-medium px-2 py-1 bg-slate-300 text-teal-700 rounded">
                                {{ ucfirst($paketPernikahan->status_paket) }}
                            </span>
                        </p>
                    </div>
                </div>

                @php
                    $gambarDekorasi      = $paketPernikahan->dekorasiUsaha->gambarPromosi;
                    $gambarTataRias      = $paketPernikahan->tataRiasUsaha->gambarPromosi;
                    $gambarCatering      = $paketPernikahan->cateringUsaha->gambarPromosi;
                    $gambarKuePernikahan = $paketPernikahan->kuePernikahanUsaha->gambarPromosi;
                    $gambarFotografer    = $paketPernikahan->fotograferUsaha->gambarPromosi;
                    $gambarEntertainment = $paketPernikahan->entertainmentUsaha->gambarPromosi;
                @endphp

                <div class="bg-slate-100 flex flex-col rounded-sm shadow-lg" x-data="{ current: 0, total: {{ $gambarDekorasi->count() }} }">
                    <div class="relative">
                        @foreach ($gambarDekorasi as $index => $gambar)
                            <img src="{{ asset('storage/' . $gambar->file_path) }}" 
                                x-show="current === {{ $index }}" 
                                alt="Gambar Promosi" 
                                class="h-56 w-full object-cover bg-center rounded-t-sm transition duration-500">
                        @endforeach
    
                        <!-- Tombol Panah -->
                        <button @click="current = current > 0 ? current - 1 : total - 1"
                                class="absolute left-2 top-1/2 -translate-y-1/2 bg-teal-500 poppins-medium text-slate-100 px-2 py-0 rounded-full transition delay-50 duration-300 hover:bg-teal-700">
                            &lt;
                        </button>
                        <button @click="current = current < total - 1 ? current + 1 : 0"
                                class="absolute right-2 top-1/2 -translate-y-1/2 bg-teal-500 poppins-medium text-slate-100 px-2 py-0 rounded-full transition delay-50 duration-300 hover:bg-teal-700">
                            &gt;
                        </button>
                    </div>
                    
                    <div class="flex flex-col gap-2 px-2">
                        <span class="poppins-semibold text-teal-600 text-2xl">{{ $paketPernikahan->dekorasiUsaha->requestMitra->nama_usaha }}</span>
                        <span class="poppins-medium text-slate-600 text-end">{{ $paketPernikahan->ket_dekorasi }}</span>
                    </div>
                </div>

                <div class="bg-slate-100 flex flex-col rounded-sm shadow-lg" x-data="{ current: 0, total: {{ $gambarTataRias->count() }} }">
                    <div class="relative">
                        @foreach ($gambarTataRias as $index => $gambarTR)
                            <img src="{{ asset('storage/' . $gambarTR->file_path) }}"
                                x-show="current === {{ $index }}"
                                alt="thumbnail"
                                class="h-56 w-full object-cover bg-center rounded-t-sm transition duration-500">
                        @endforeach

                        <!-- Tombol Panah -->
                        <button @click="current = current > 0 ? current - 1 : total - 1"
                                class="absolute left-2 top-1/2 -translate-y-1/2 bg-teal-500 poppins-medium text-slate-100 px-2 py-0 rounded-full transition delay-50 duration-300 hover:bg-teal-700">
                            &lt;
                        </button>
                        <button @click="current = current < total - 1 ? current + 1 : 0"
                                class="absolute right-2 top-1/2 -translate-y-1/2 bg-teal-500 poppins-medium text-slate-100 px-2 py-0 rounded-full transition delay-50 duration-300 hover:bg-teal-700">
                            &gt;
                        </button>
                    </div>
                    
                    <div class="flex flex-col gap-2 px-2">
                        <span class="poppins-semibold text-teal-600 text-2xl">{{ $paketPernikahan->tataRiasUsaha->requestMitra->nama_usaha }}</span>
                        <span class="poppins-medium text-slate-600 text-end">{{ $paketPernikahan->ket_tata_rias }}</span>
                    </div>
                </div>

                <div class="bg-slate-100 flex flex-col rounded-sm shadow-lg" x-data="{ current: 0, total: {{ $gambarCatering->count() }} }">
                    <div class="relative">
                        @foreach ($gambarCatering as $index => $gambar)
                            <img src="{{ asset('storage/' . $gambar->file_path) }}" x-show="current === {{ $index }}" alt="thumbnail" class="h-56 w-full object-cover bg-center rounded-t-sm transition duration-500">
                        @endforeach
                        
                        <!-- Tombol Panah -->
                        <button @click="current = current > 0 ? current - 1 : total - 1"
                                class="absolute left-2 top-1/2 -translate-y-1/2 bg-teal-500 poppins-medium text-slate-100 px-2 py-0 rounded-full transition delay-50 duration-300 hover:bg-teal-700">
                            &lt;
                        </button>
                        <button @click="current = current < total - 1 ? current + 1 : 0"
                                class="absolute right-2 top-1/2 -translate-y-1/2 bg-teal-500 poppins-medium text-slate-100 px-2 py-0 rounded-full transition delay-50 duration-300 hover:bg-teal-700">
                            &gt;
                        </button>
                    </div>
                    
                    <div class="flex flex-col gap-2 px-2">
                        <span class="poppins-semibold text-teal-600 text-2xl">{{ $paketPernikahan->cateringUsaha->requestMitra->nama_usaha }}</span>
                        <span class="poppins-medium text-slate-600 text-end">{{ $paketPernikahan->ket_catering }}</span>
                    </div>
                </div>

                <div class="bg-slate-100 flex flex-col rounded-sm shadow-lg" x-data="{ current: 0, total: {{ $gambarKuePernikahan->count() }} }">
                    <div class="relative">
                        @foreach ($gambarKuePernikahan as $index => $gambar)
                            <img src="{{ asset('storage/' . $gambar->file_path) }}" x-show="current === {{ $index }}"
                                alt="thumbnail" class="h-56 w-full object-cover bg-center rounded-t-sm transition duration-500">
                        @endforeach
                        
                        <!-- Tombol Panah -->
                        <button @click="current = current > 0 ? current - 1 : total - 1"
                                class="absolute left-2 top-1/2 -translate-y-1/2 bg-teal-500 poppins-medium text-slate-100 px-2 py-0 rounded-full transition delay-50 duration-300 hover:bg-teal-700">
                            &lt;
                        </button>
                        <button @click="current = current < total - 1 ? current + 1 : 0"
                                class="absolute right-2 top-1/2 -translate-y-1/2 bg-teal-500 poppins-medium text-slate-100 px-2 py-0 rounded-full transition delay-50 duration-300 hover:bg-teal-700">
                            &gt;
                        </button>
                    </div>
                    
                    <div class="flex flex-col gap-2 px-2">
                        <span class="poppins-semibold text-teal-600 text-2xl">{{ $paketPernikahan->kuePernikahanUsaha->requestMitra->nama_usaha }}</span>
                        <span class="poppins-medium text-slate-600 text-end">{{ $paketPernikahan->ket_kue_pernikahan }}</span>
                    </div>
                </div>

                <div class="bg-slate-100 flex flex-col rounded-sm shadow-lg" x-data="{ current: 0, total: {{ $gambarFotografer->count() }} }">
                    <div class="relative">
                        @foreach ($gambarFotografer as $index => $gambar)
                            <img src="{{ asset('storage/' . $gambar->file_path) }}" x-show="current === {{ $index }}"
                                alt="thumbnail" class="h-56 w-full object-cover bg-center rounded-t-sm transition duration-500">
                        @endforeach
                        
                        <!-- Tombol Panah -->
                        <button @click="current = current > 0 ? current - 1 : total - 1"
                                class="absolute left-2 top-1/2 -translate-y-1/2 bg-teal-500 poppins-medium text-slate-100 px-2 py-0 rounded-full transition delay-50 duration-300 hover:bg-teal-700">
                            &lt;
                        </button>
                        <button @click="current = current < total - 1 ? current + 1 : 0"
                                class="absolute right-2 top-1/2 -translate-y-1/2 bg-teal-500 poppins-medium text-slate-100 px-2 py-0 rounded-full transition delay-50 duration-300 hover:bg-teal-700">
                            &gt;
                        </button>
                    </div>
                    
                    <div class="flex flex-col gap-2 px-2">
                        <span class="poppins-semibold text-teal-600 text-2xl">{{ $paketPernikahan->fotograferUsaha->requestMitra->nama_usaha }}</span>
                        <span class="poppins-medium text-slate-600 text-end">{{ $paketPernikahan->ket_fotografer }}</span>
                    </div>
                </div>

                <div class="bg-slate-100 flex flex-col rounded-sm shadow-lg" x-data="{ current: 0, total: {{ $gambarEntertainment->count() }} }">
                    <div class="relative">
                        @foreach ($gambarEntertainment as $index => $gambar)
                            <img src="{{ asset('storage/' . $gambar->file_path) }}" x-show="current === {{ $index }}"
                                alt="thumbnail" class="h-56 w-full object-cover bg-center rounded-t-sm transition duration-500">
                        @endforeach
                        
                        <!-- Tombol Panah -->
                        <button @click="current = current > 0 ? current - 1 : total - 1"
                                class="absolute left-2 top-1/2 -translate-y-1/2 bg-teal-500 poppins-medium text-slate-100 px-2 py-0 rounded-full transition delay-50 duration-300 hover:bg-teal-700">
                            &lt;
                        </button>
                        <button @click="current = current < total - 1 ? current + 1 : 0"
                                class="absolute right-2 top-1/2 -translate-y-1/2 bg-teal-500 poppins-medium text-slate-100 px-2 py-0 rounded-full transition delay-50 duration-300 hover:bg-teal-700">
                            &gt;
                        </button>
                    </div>
                    
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
    
    <script src="//unpkg.com/alpinejs" defer></script>
</x-layout>