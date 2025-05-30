<x-layout-home>
    <!-- Kerjasama -->
    <div class="w-full bg-teal-700 h-108 flex px-3 py-2">
        <div class="w-full h-full bg-[url('/public/images/deal.jpg')] bg-cover bg-center"></div>

        <div class="w-full bg-slate-100 flex flex-col justify-center items-center gap-5">
            <span class="w-xl poppins-semibold text-slate-700 text-4xl text-center px-3 py-1">BUAT KERJASAMA DENGAN HATMA WEDDING ORGANIZER</span>
            @auth
                <a href="{{ route('customer.request_mitra.create') }}" class="w-1/4 poppins-semibold bg-teal-500 text-slate-100 text-2xl text-center px-3 py-1 transition delay-50 duration-300 hover:bg-teal-700">DAFTAR</a>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="w-1/4 poppins-semibold bg-teal-500 text-slate-100 text-2xl text-center px-3 py-1 transition delay-50 duration-300 hover:bg-teal-700">Log In</a>
            @endguest
        </div>
    </div>

    <!-- Paket Pernikahan -->
    <div class="bg-teal-700 flex flex-col items-center p-5 gap-4 shadow shadow-slate-500">
        <span class="poppins-semibold text-slate-100 text-3xl text-center">
            Paket Pernikahan
        </span>
        
        <div class="w-full flex justify-center gap-3">
            @foreach ($paketPernikahans as $paketPernikahan)
                <div class="bg-slate-200 w-1/5 flex flex-col px-1 py-1 gap-1 shadow shadow-500/80 shadow shadow-slate-500">
                    <div class="h-45 bg-[url('/public/images/snowing.jpg')] bg-cover bg-center flex justify-end items-end">
                        <a href="{{ route('customer.pesanan.create', ['paket_id' => $paketPernikahan->id]) }}" target="_blank" class="poppins-medium h-fit bg-teal-600 text-slate-100 text-center px-3 py-1 transition delay-50 duration-500 hover:bg-teal-700">
                            Pesan
                        </a>
                    </div>

                    <div class="flex flex-col justify-between px-2 gap-3">
                        <div class="flex justify-between">
                            <span class="poppins-semibold text-slate-700 text-xl">
                                {{ $paketPernikahan->nama_paket }}
                            </span>
                        </div>

                        <span class="poppins text-slate-600 text-md text-end">
                            Rp. {{ $paketPernikahan->hargaDP_paket }}-{{ $paketPernikahan->hargaLunas_paket }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{ route('customer.paket_pernikahan.index') }}" class="poppins-italic-medium text-slate-100 underling hover:text-teal-500 underline">
            Lebih banyak
        </a>
    </div>

    <!-- Ulasan -->
    <div class="flex flex-row">
        <div class="bg-teal-700 w-1/3 flex flex-col justify-center items-center gap-3 shadow shadow-slate-500">
            <span class="poppins-semibold text-slate-100 text-5xl">ULASAN</span>
            
            <a href="{{ route('customer.ulasan.index') }}" class="poppins-italic text-slate-100 text-sm underline hover:text-teal-500">
                Lebih banyak...
            </a>
        </div>

        <div class="w-full flex justify-center gap-4 p-8 overflow-auto">
            @foreach ($ulasans as $ulasan)
                <div class="w-1/3 bg-teal-700 flex flex-col shadow shadow-slate-500">
                    @php
                        $imagePath = asset('storage/' . $ulasan->upload_file);
                    @endphp
                    
                    <div class="h-56 bg-cover bg-center py-2" style="background-image: url('{{ $imagePath }}')">
                        <div class="bg-teal-700 w-fit flex items-center px-3 py-1 gap-3 rounded-r-full">
                            <img src="{{ $ulasan->user->profile_pic ? asset('storage/' . $ulasan->user->profile_pic) : '' }}" alt="Profile picture"
                                class="w-7 h-7 bg-cover bg-center rounded-full">
    
                            <span class="poppins-medium text-slate-100 line-clamp-1">{{ $ulasan->user->name }}</span>
                        </div>
                    </div>

                    <span class="poppins text-slate-100 text-sm text-justify px-3 py-1 line-clamp-3">
                        <span class="px-3"></span>{{ $ulasan->ulasan }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
</x-layout-home>