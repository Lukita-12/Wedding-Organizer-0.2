<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Organizer</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="font-family:'Times New Roman', Times, serif;">

    <div class="h-screen flex flex-col gap-4">
        <div class="flex flex-col gap-3">

            <!-- Heading -->
            <div class="flex items-center justify-between px-6">
                <img src="{{ asset('images/hatma-icon.png') }}" alt="Logo's" class="h-32 bg-cover bg-center">
    
                <div class="flex flex-col items-center gap-2">
                    <p class="text-center text-2xl font-bold tracking-wide leading-none">
                        LAPORAN PESANAN PELANGGAN<br>
                        HATMA WEDDING ORGANIZER <br>
                        TAHUN {{ \Carbon\Carbon::now()->translatedFormat('Y') }}
                    </p>
        
                    <p class="text-center text-sm line-clamp-3 tracking-wide">
                        Jalan Sepakat Rt. 33 No. 12 Kelurahan, Pemurus Dalam, Kec. <br>
                        Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan <br>
                        70236
                    </p>
                </div>
    
                <span></span>
            </div>

            <!-- Line -->
            <div class="w-full flex flex-col justify-center gap-1">
                <span class="w-full border-b"></span>
                <span class="w-full border-b-3"></span>
            </div>

            <!-- Body -->
            <span></span>
            <!-- Pelanggan -->
            <h2 class="text-start text-2xl font-bold">INFORMASI PELANGGAN :</h2>

            <div class="grid grid-cols-2 gap-3">
                <div class="">
                    <p>Nama Lengkap :</p>
                    <p>Jenis Kelamin :</p>
                    <p>No. Telpon/WA :</p>
                    <p>Email :</p>
                    <p>Alamat :</p>
                </div>
                <div class="text-end">
                    <p>{{ $pesanan->pelanggan->nama_pelanggan }}</p>
                    <p>{{ $pesanan->pelanggan->jk_pelanggan }}</p>
                    <p>{{ $pesanan->pelanggan->noTelp_pelanggan }}</p>
                    <p>{{ $pesanan->pelanggan->email_pelanggan }}</p>
                    <p>{{ $pesanan->pelanggan->alamat_pelanggan }}</p>
                </div>
            </div>

            <hr class="border-t-2">

            <!-- Paket Pernikahan -->
            <h2 class="text-start text-2xl font-bold">INFORMASI PAKET PERNIKAHAN :</h2>
            <div class="flex flex-col">
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
                    <p class="text-end">{{ $pesanan->paketPernikahan->ket_dekorasi ?? '-' }}</p>
                </div>

                <div class="grid grid-cols-2">
                    <p>Tata rias :</p>
                    <p class="text-end">{{ $pesanan->paketPernikahan->ket_tata_rias ?? '-' }}</p>
                </div>

                <div class="grid grid-cols-2">
                    <p>Catering :</p>
                    <p class="text-end">{{ $pesanan->paketPernikahan->ket_catering ?? '-' }}</p>
                </div>

                <div class="grid grid-cols-2">
                    <p>Kue Pernikahan :</p>
                    <p class="text-end">{{ $pesanan->paketPernikahan->ket_kue_pernikahan ?? '-' }}</p>
                </div>

                <div class="grid grid-cols-2">
                    <p>Foto :</p>
                    <p class="text-end">{{ $pesanan->paketPernikahan->ket_fotografer ?? '-' }}</p>
                </div>

                <div class="grid grid-cols-2">
                    <p>Entertainment :</p>
                    <p class="text-end">{{ $pesanan->paketPernikahan->ket_entertainment ?? '-' }}</p>
                </div>
            </div>
            
            <br>
    
            <!-- Total Harga -->
            <div class="grid grid-cols-2 text-xl font-bold">
                <div>Harga DP :</div>
                <div class="text-end font-medium">
                    Rp. {{ number_format($pesanan->harga_dp, 0, ',', '.') }}
                </div>

                <div>Harga Lunas :</div>
                <div class="text-end font-medium">
                    Rp. {{ number_format($pesanan->harga_lunas, 0, ',', '.') }}
                </div>

                <hr class="col-span-2 border-t-2">

                <div>Total Harga :</div>
                <div class="text-end font-medium">
                    Rp. {{ number_format($pesanan->total_harga_pesanan, 0, ',', '.') }}
                </div>
            </div>
             
        </div>
    </div>

</body>
</html>