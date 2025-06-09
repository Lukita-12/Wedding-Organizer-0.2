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

        <div class="flex flex-col gap-4">
            <!-- Heading -->
            <div class="flex items-center justify-between px-6">
                <img src="{{ asset('images/hatma-icon.png') }}" alt="Logo's" class="h-32 bg-cover bg-center">
    
                <div class="flex flex-col items-center gap-2">
                    <p class="text-center text-2xl font-bold tracking-wide leading-none">
                        LAPORAN {{ $heading }} <br>
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
            {{ $slot }}
        </div>        

        <!-- Footing -->
        <div class="w-full flex justify-end">
            <div class="flex flex-col items-center gap-20 px-20">
                <div class="flex flex-col items-center">
                    <p class="text-sm">{{ \Carbon\Carbon::now()->translatedFormat('l, d-F-Y') }}</p>
                    <p class="font-bold">OWNER HATMA GROUP</p>
                </div>
    
                <p class="font-medium text-sm underline">AKBAR HATMA</p>
            </div>
        </div>
    </div>

</body>
</html>