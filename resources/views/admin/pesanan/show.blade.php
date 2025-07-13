<x-layout>

    <div class="flex flex-col items-center p-6">
        <div class="w-1/3 bg-white border rounded p-6">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('images/hatma-icon.png') }}" alt="Logo" class="h-24 bg-cover bg-center">
            </div>
    
            <!-- Pelanggan -->
            <h2 class="text-center text-2xl font-bold text-slate-700 mb-4">PELANGGAN</h2>
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="text-slate-600">
                    <p>Nama Lengkap :</p>
                    <p>Jenis Kelamin :</p>
                    <p>No. Telpon/WA :</p>
                    <p>Email :</p>
                    <p>Alamat :</p>
                </div>
                <div class="text-end text-slate-700">
                    <p>{{ $pesanan->pelanggan->nama_pelanggan }}</p>
                    <p>{{ $pesanan->pelanggan->jk_pelanggan }}</p>
                    <p>{{ $pesanan->pelanggan->noTelp_pelanggan }}</p>
                    <p>{{ $pesanan->pelanggan->email_pelanggan }}</p>
                    <p>{{ $pesanan->pelanggan->alamat_pelanggan }}</p>
                </div>
            </div>
    
            <hr class="border-t-2 border-slate-300 my-6">
    
            <!-- Paket Pernikahan -->
            <h2 class="text-center text-2xl font-bold text-slate-700 mb-4">PAKET PERNIKAHAN</h2>
            <div class="flex flex-col text-slate-500">
                <?php
                /*
                <div class="grid grid-cols-2">
                    <p>Venue :</p>
                    <p class="text-end">{{ $pesanan->paketPernikahan?->venueUsaha?->{"ket_" . $pesanan->paketPernikahan->venue_ket_harga} ?? '-' }}</p>
                </div>
                */
                ?>

                <div class="grid grid-cols-2">
                    <p>Dekorasi :</p>
                    <p class="text-end">{{ $pesanan->paketPernikahan?->dekorasiUsaha?->{"ket_" . $pesanan->paketPernikahan->dekorasi_ket_harga} ?? '-' }}</p>
                </div>

                <div class="grid grid-cols-2">
                    <p>Tata rias :</p>
                    <p class="text-end">{{ $pesanan->paketPernikahan?->tataRiasUsaha?->{"ket_" . $pesanan->paketPernikahan->tata_rias_ket_harga} ?? '-' }}</p>
                </div>

                <div class="grid grid-cols-2">
                    <p>Catering :</p>
                    <p class="text-end">{{ $pesanan->paketPernikahan?->cateringUsaha?->{"ket_" . $pesanan->paketPernikahan->catering_ket_harga} ?? '-' }}</p>
                </div>

                <div class="grid grid-cols-2">
                    <p>Kue Pernikahan :</p>
                    <p class="text-end">{{ $pesanan->paketPernikahan?->kuePernikahanUsaha?->{"ket_" . $pesanan->paketPernikahan->kue_pernikahan_ket_harga} ?? '-' }}</p>

                </div>

                <div class="grid grid-cols-2">
                    <p>Foto :</p>
                    <p class="text-end">{{ $pesanan->paketPernikahan?->fotograferUsaha?->{"ket_" . $pesanan->paketPernikahan->fotografer_ket_harga} ?? '-' }}</p>
                </div>

                <div class="grid grid-cols-2">
                    <p>Entertainment :</p>
                    <p class="text-end">{{ $pesanan->paketPernikahan?->entertainmentUsaha?->{"ket_" . $pesanan->paketPernikahan->entertainment_ket_harga} ?? '-' }}</p>
                </div>
            </div>
    
            <hr class="border-t-2 border-slate-300 my-6">
    
            <!-- Total Harga -->
            <div class="grid grid-cols-2 gap-4 text-xl font-bold text-slate-700">
                <div>Total Harga :</div>
                <div class="text-end text-teal-600">
                    Rp. {{ number_format($pesanan->total_harga_pesanan, 0, ',', '.') }}
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-6 flex justify-end">
            <a href="{{ route('admin.pesanan.index') }}"
            class="poppins-medium px-4 py-2 bg-slate-500 text-white rounded hover:bg-slate-700 transition">
                Kembali
            </a>
        </div>
    </div>
</x-layout>
