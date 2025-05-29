<x-layout-home>
    <div class="h-155 bg-teal-700 flex flex-col items-center p-5 gap-4 shadow shadow-slate-500">
        <span class="poppins-semibold text-slate-100 text-3xl text-center">
            Paket Pernikahan
        </span>
        
        <div class="w-full grid grid-cols-4 justify-center px-12 gap-3 overflow-auto">
            @foreach ($paketPernikahans as $paketPernikahan)
                <div class="bg-slate-200 w-full flex flex-col px-1 py-1 gap-1 shadow shadow-500/80 shadow shadow-slate-500">
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
    </div>
</x-layout-home>