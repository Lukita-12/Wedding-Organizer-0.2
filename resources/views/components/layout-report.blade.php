<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Organizer</title>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="w-screen h-screen bg-white flex flex-col justify-center px-10 gap-6">
    <div class="flex flex-col gap-1">
        <div class="text-center">
            <p class="poppins-bold text-2xl">{{ $laporan }}</p>
            <p class="poppins-bold text-2xl">HATMA WEDDING ORGANIZER</p>
            <p class="poppins-bold text-2xl">TAHUN ......../........</p>
        </div>

        <div class="text-center">
            <p class="poppins-medium text-sm">Jalan Sepakat Rt. 33 No. 12 Kelurahan, Pemurus Dalam, Kec.</p>
            <p class="poppins-medium text-sm">Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan</p>
            <p class="poppins-medium text-sm">70236</p>
        </div>
    </div>

    {{ $slot }}

    <div class="h-24 flex justify-end px-14">
        <div class="w-fit flex flex-col justify-between text-center">
            <p class="poppins-bold">OWNER HATMA GROUP</p>
            <p class="poppins-medium text-sm underline">AKBAR HATMA</p>
        </div>
    </div>
</body>
</html>