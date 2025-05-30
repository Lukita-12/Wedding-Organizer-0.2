<x-layout>
    <div class="h-screen flex justify-center items-center">
        <div class="bg-white w-sm h-fit flex flex-col justify-between px-6 py-6 gap-14">
            <div class="flex justify-center">
                <img src="{{ asset('images/hatma-icon.png') }}" alt="Hatma Logo" class="w-32 h-32">
            </div>
    
            <div class="flex flex-col items-between gap-1">
                <div class="flex justify-between">
                    <p class="poppins-medium text-teal-600">INVOICE</p>
                    <p class="text-end poppins-light">
                        {{ $pembayaran->id }}
                        {{ $pesanan->id }}
                        {{ $pelanggan->id }}
                        {{ $user->id }}
                    </p>
                </div>
    
                <span class="border"></span>
    
                <div class="poppins-light grid grid-cols-2">
                    <p>Nama</p>
                    <p class="text-end">{{ $pelanggan->nama_pelanggan ?? '-' }}</p>
                    
                    <p>No. Telp</p>
                    <p class="text-end">{{ $pelanggan->noTelp_pelanggan ?? '-' }}</p>
                    
                    <p>Email</p>
                    <p class="text-end">{{ $pelanggan->email_pelanggan ?? '-' }}</p>
                    
                    <p>Paket pernikahan</p>
                    <p class="text-end">{{ $pesanan->paketPernikahan->nama_Paket ?? '-' }}</p>
                </div>
                
                <span class="border"></span>
    
                <div class="flex justify-between">
                    <p class="poppins-medium text-teal-600">Total</p>
                    <p class="text-end poppins-light">Rp. {{ number_format($pesanan->total_harga_pesanan, 0, ',', '.') }}</p>
                </div>
            </div>
    
            <div class="poppins-light">
                <p class="poppins-medium text-teal-600">HATMA WEDDING ORGANIZER</p>
                <p class="text-xs">Jalan Sepakat Rt 33 No 12 Kelurahan, Pemurus Dalam,</p>
                <p class="text-xs">Kec. Banjarmasin Sel., Kota Banjarmasin,</p>
                <p class="text-xs">Kalimantan Selatan 70236.</p>
            </div>
        </div>
    </div>
</x-layout>