<x-layout-home>
    <div class="h-135 overflow-auto">        
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
</x-layout-home>