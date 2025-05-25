<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Organizer</title>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100">
    <div class="flex justify-between items-center px-4 py-1">
        <nav class="flex gap-1">
            <a href="{{ route('home') }}" class="border border-dashed poppins-medium text-slate-700 text-lg px-3 transition delay-50 duration-300 hover:bg-teal-500 hover:text-slate-100">Home</a>
            <a href="{{ route('customer.paket_pernikahan.index') }}" class="border border-dashed poppins-medium text-slate-700 text-lg px-3 transition delay-50 duration-300 hover:bg-teal-500 hover:text-slate-100">Paket Pernikahan</a>
            <a href="{{ route('customer.kerjasama.index') }}" class="border border-dashed poppins-medium text-slate-700 text-lg px-3 transition delay-50 duration-300 hover:bg-teal-500 hover:text-slate-100">Kerjasama</a>
            <a href="{{ route('customer.pesanan.index') }}" class="border border-dashed poppins-medium text-slate-700 text-lg px-3 transition delay-50 duration-300 hover:bg-teal-500 hover:text-slate-100">Pesanan</a>
            <a href="{{ route('customer.ulasan.index') }}" class="border border-dashed poppins-medium text-slate-700 text-lg px-3 transition delay-50 duration-300 hover:bg-teal-500 hover:text-slate-100">Galery</a>
        </nav>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="poppins-semibold bg-red-500 text-slate-100 text-lg px-3 py-1 transition delay-50 duration:300 hover:bg-red-700">Log Out</button>
        </form>
    </div>

    <main class="">
        <div class="w-full h-135 bg-[url('/public/images/flower-red-winter.jpg')] bg-cover bg-center flex flex-col justify-center items-center">
            <div class="backdrop-blur-sm w-full flex flex-col items-center py-4 gap-3">
                <span class="w-md poppins-bold text-slate-100 text-center text-5xl">HATMA WEDDING ORGANIZER</span>
                <span class="my-1"></span>
                <a href="{{ route('customer.pesanan.create') }}" class="w-3xs poppins-semibold bg-teal-500/80 text-slate-100 text-3xl text-center px-3 py-1 transition delay-50 duration-300 hover:bg-teal-700">PESAN</a>
            </div>
        </div>
        
        {{ $slot }}

        <!-- Footing -->
        <div class="h-56 bg-slate-700 bg-cover bg-center flex flex-col justify-end items-center py-4">        
            <div class="w-full flex flex-col items-center">
                <span class="w-1/3 poppins-italic-light text-slate-100 text-center text-xs">Jalan Sepakat Rt 33 No 12 Kelurahan, Pemurus Dalam, Kec. Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan 70236.</span>
                <span class="w-1/2 border border-slate-100 my-1"></span>
                <nav class="w-1/2 flex justify-center px-4 gap-4">
                    <a href="{{ route('home') }}" class="poppins-light text-slate-100 transition delay-50 duration-300 hover:text-slate-400">Home</a>
                    <a href="{{ route('customer.kerjasama.index') }}" class="poppins-light text-slate-100 transition delay-50 duration-300 hover:text-slate-400">Kerjasama</a>
                    <a href="{{ route('customer.ulasan.index') }}" class="poppins-light text-slate-100 transition delay-50 duration-300 hover:text-slate-400">Galery</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="poppins-light text-slate-100 transition delay-50 duration-300 hover:text-slate-400">Log Out</button>
                    </form>
                </nav>
            </div>
        </div>
    </main>

</body>
</html>