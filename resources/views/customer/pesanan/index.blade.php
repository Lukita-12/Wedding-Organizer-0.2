<x-layout>

    <div class="grid grid-cols-2 gap-3">
        @foreach ($pesanans as $pesanan)
            <div class="bg-slate-200 flex justify-between px-4 py-1 shadow shadow-slate-500/80">
                <div class="flex flex-col">
                    <span class="poppins-semibold text-teal-600 text-lg">{{ $pesanan->pelanggan->nama_pelanggan }}</span>
                    <span class="poppins text-slate-500 text-sm">{{ $pesanan->pelanggan->email_pelanggan }}</span>
                    <span class="my-2"></span>
                    <span class="poppins text-slate-500">
                        <span class="poppins-semibold text-slate-700">Paket: </span>{{ $pesanan->paketPernikahan->nama_paket ?? '-' }}
                    </span>
                </div>
                <div  class="flex flex-col justify-between items-end">
                    <a href="#" class="poppins text-slate-700 text-sm transition delay-50 duration-300 hover:text-teal-500">Lihat ></a>
                    <div class="flex flex-col justify-end items-end">
                        <span class="poppins text-teal-600">{{ $pesanan->status_pesanan }}</span>
                        <span class="poppins text-slate-700 text-lg">
                            <span class="poppins-bold">Total: </span>Rp. {{ number_format($pesanan->total_harga_pesanan, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-layout>