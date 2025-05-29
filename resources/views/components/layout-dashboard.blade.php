<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Organizer</title>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 flex">
    <aside class="w-64 min-h-screen bg-slate-700 flex flex-col justify-between items-center px-3 py-3">
        <x-sidebar.container variant="content">
            <span class="poppins-semibold text-slate-100 text-2xl">LOGO's</span>
            <span class="w-full border border-slate-100"></span>
            <nav class="w-full flex flex-col gap-1">
                <x-sidebar.nav-link href="{{ url('/dashboard') }}">Dashboard</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('admin.bank.index') }}">Bank</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('admin.akun.index') }}">Akun</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('admin.pelanggan.index') }}">Pelanggan</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('admin.request_mitra.index') }}">Permintaan</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('admin.kerjasama.index') }}">Kerjasama</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('admin.paket_pernikahan.index') }}">Paket pernikahan</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('admin.pesanan.index') }}">Pesanan</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('admin.pembayaran.index') }}">Pembayaran</x-sidebar.nav-link>
                <x-sidebar.nav-link href="{{ route('admin.ulasan.index') }}">Ulasan</x-sidebar.nav-link>
            </nav>
        </x-sidebar.container>

        <x-sidebar.container>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full bg-red-500 poppins-semibold text-slate-100 text-lg px-3 py-1 transition delay-50 duration:300 hover:bg-red-700">
                    Log Out
                </button>
            </form>
        </x-sidebar.container>
    </aside>

    <main class="flex-1 overflow-auto">
        <div class="sticky top-0 left-0 w-full bg-slate-200 flex justify-between items-center shadow shadow-slate-700 px-4 py-1">
            <span class="poppins-semibold text-teal-700 text-2xl">{{ $heading }}</span>
            <img src="{{ auth()->user()->profile_picture ?? '-' }}" alt="Profile picture"
                class="cursor-pointer w-9 h-9 object-cover rounded-full transition delay-50 duration:300 hover:ring-2 hover:ring-teal-500 hover:ring-offset-2">
        </div>
        
        <div class="w-full flex flex-col px-6 py-6 gap-8">
            {{ $slot }}
        </div>
    </main>

</body>
</html>