<x-layout-home>
    <!-- Kerjasama -->
    <div class="w-full h-108 flex">
        <div class="w-full h-full bg-[url('/public/images/snowing.jpg')] bg-cover bg-center"></div>

        <div class="w-full flex flex-col justify-center items-center gap-5">
            <span class="w-xl poppins-semibold text-slate-700 text-4xl text-center px-3 py-1">BUAT KERJASAMA DENGAN HATMA WEDDING ORGANIZER</span>
            @auth
                <a href="{{ route('customer.request_mitra.create') }}" class="w-1/4 poppins-semibold bg-teal-500 text-slate-100 text-2xl text-center px-3 py-1 transition delay-50 duration-300 hover:bg-teal-700">DAFTAR</a>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="w-1/4 poppins-semibold bg-teal-500 text-slate-100 text-2xl text-center px-3 py-1 transition delay-50 duration-300 hover:bg-teal-700">Log In</a>
            @endguest
        </div>
    </div>

    <!-- Paket pernikahan -->
    <div class="h-108 overflow-auto px-4">
        <div class="flex justify-between items-end">
            <div class="flex items-center py-2 gap-2">
                <!-- <span class="w-2 h-2 bg-slate-500 rounded-full"></span> -->
                <spans class="poppins-semibold text-slate-700 text-2xl">Paket Pernikahan</span>
            </div>
            <spans class="poppins-italic text-slate-700 underline transition delay-50 duration-300 hover:text-teal-700">Lebih banyak ></span>
        </div>

        <div class="grid grid-cols-4 gap-3">
            @foreach ($paketPernikahans as $paketPernikahan)
                <div class="bg-slate-200 flex flex-col px-1 py-1 gap-1 shadow shadow-500/80">
                    <div class="h-45 bg-[url('/public/images/snowing.jpg')] bg-cover bg-center flex items-end">
                        <div class="w-full backdrop-blur-sm px-2 py-1">
                            <span class="poppins border border-slate-700 text-slate-700 text-sm px-1 transition delay-50 duration-500 hover:bg-slate-100/50"># Tag</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center px-3 py-1">
                        <div class="flex flex-col">
                            <span class="poppins-semibold text-slate-700 text-lg">{{ $paketPernikahan->nama_paket }}</span>
                            <span class="poppins text-slate-500 text-sm text-center">{{ $paketPernikahan->hargaDP_paket }}-{{ $paketPernikahan->hargaLunas_paket }}</span>
                        </div>
                        <a href="{{ route('customer.pesanan.create', ['paket_id' => $paketPernikahan->id]) }}" target="_blank" class="poppins-medium h-fit bg-teal-600 text-slate-100 text-center items-center px-3 py-1 transition delay-50 duration-500 hover:bg-teal-700">Pesan</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Ulasan -->
    <div class="h-108 flex flex-col px-4 py-2 gap-3">
        <div class="flex justify-between items-end">
            <span class="poppins-semibold text-slate-700 text-3xl">Ulasan</span>
            <a href="{{ route('customer.ulasan.index') }}" class="poppins-italic text-slate-700 underline transition delay-50 duration-500 hover:text-teal-500">Lebih banyak...</a>
        </div>
        
        <div class="grid grid-cols-3 gap-4 overflow-y-auto">
            @foreach ($ulasans as $ulasan)
                <div class="h-fit bg-slate-200 flex flex-col px-1 py-1 shadow-md shadow-700">
                    @php
                        $imagePath = asset('storage/' . $ulasan->upload_file);
                    @endphp
                    <div class="w-full h-56 bg-cover bg-center px-2 py-2" style="background-image: url('{{ $imagePath }}')">
                        <div class="w-fit backdrop-blur-lg flex items-center px-1 py-1 gap-2 rounded-l-full">
                            <img src="{{ $ulasan->user->profile_pic ? asset('storage/' . $ulasan->user->profile_pic) : '' }}" alt="Profile picture" class="w-7 h-7 bg-cover bg-center rounded-full">
                            <span class="poppins-medium text-slate-700">{{ $ulasan->user->name }}</span>
                        </div>
                    </div>
                    <div>
                        <span class="poppins text-slate-700 text-sm text-justify px-3 py-1 line-clamp-3 leading-relaxed"><span class="px-3"></span>{{ $ulasan->ulasan }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout-home>