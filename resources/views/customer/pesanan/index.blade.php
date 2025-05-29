<x-layout-home>
    <div class="h-160 flex flex-col items-center px-24 py-8 gap-3">
        <span class="poppins-semibold text-teal-700 text-3xl text-center">
            Pesanan
        </span>

        <div class="w-full grid grid-cols-3 content-center gap-4">
            @foreach ($pesanans as $pesanan)
                <div class="bg-slate-200 flex flex-col shadow shadow-slate-500">
                    <div class="h-32 bg-teal-700 flex justify-between px-3 py-2">
                        <img src="{{ auth()->user()->profile_picture ?? '-' }}" alt="Profile picture" class="h-14 rounded-full">

                        @if ($pesanan->pembayaran)
                            <a href="{{ route('customer.pembayaran.edit', $pesanan->pembayaran->id ?? '-') }}"
                                class="inline-block h-fit bg-slate-100 poppins-semibold text-teal-700 text-lg px-3 py-1 rounded-xs transition delay-50 duration-300 hover:bg-slate-300">
                                Bayar
                            </a>
                        @else
                            <span class="poppins-light h-fit text-slate-100 transition delay-50 duration-300 hover:text-teal-500">Menunggu konfirmasi</span>
                        @endif  
                    </div>
        
                    <div class="flex flex-col px-3 py-1">
                        <div class="flex flex-col">
                            <span class="poppins-medium text-teal-700 text-xl">{{ $pesanan->pelanggan->nama_pelanggan }}</span>
                            <span class="poppins text-slate-500">{{ $pesanan->pelanggan->email_pelanggan }}</span>
                        </div>
            
                        <div class="flex justify-between items-end">
                            <span class="poppins-medium text-slate-700 text-lg">
                                <span class="poppins-semibold text-slate-700">Paket: </span>{{ $pesanan->paketPernikahan->nama_paket ?? '-' }}
                            </span>
    
                            <div class="flex flex-col items-end">
                                <span class="poppins text-teal-700">
                                    {{ $pesanan->status_pesanan }}
                                </span>
    
                                <span class="poppins-medium text-slate-700 text-lg">
                                    <span class="poppins-semibold">Total: </span>
                                    Rp. {{ number_format($pesanan->total_harga_pesanan, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout-home>