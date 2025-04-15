<x-layout>

    <!-- Header -->
    <div class="border-sketch py-2 flex justify-between items-center">
        <nav class="flex gap-1">
            <a href="{{ url('/home') }}" class="border border-dashed border-gray-700
                px-2 poppins text-lg text-center rounded-sm">
                Home
            </a>
            <a href="{{ route('customer.paket_pernikahan.index') }}" class="border border-dashed border-gray-700
                px-2 poppins text-lg text-center rounded-sm">
                Paket pernikahan
            </a>
            <a href="{{ route('customer.kerjasama.index') }}" class="border border-dashed border-gray-700
                px-2 poppins text-lg text-center rounded-sm">
                Kerjasama
            </a>
            <a href="{{ route('customer.pesanan.index') }}" class="border border-dashed border-gray-700
                px-2 poppins text-lg text-center rounded-sm">
                Pesanan
            </a>
            <a href="#" class="border border-dashed border-gray-700
                px-2 poppins text-lg text-center rounded-sm">
                Tentang kami
            </a>
        </nav>
        
        <div class="flex items-center gap-3">
            <input type="text" placeholder="Search..."
                class="border border-dashed border-gray-700
                    px-4 py-1 inter text-lg rounded-full">
            @guest
                <a href="{{ route('register') }}" class="bg-gray-400 text-white px-4 py-1 inline-block poppins-medium text-lg text-center rounded-md">Register</a>
                <a href="{{ route('login') }}" class="bg-gray-400 text-white px-4 py-1 inline-block poppins-medium text-lg text-center rounded-md">Log in</a>
            @endguest
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-gray-400 text-white px-4 py-1 inline-block poppins-medium text-lg text-center rounded-md">
                        Log out
                    </button>
                </form>
            @endauth
        </div>
    </div>

    <!-- Jumbotron -->
    <div class="border border-dashed border-gray-700   
        h-135 bg-[url('/public/images/flower-c.jpg')] bg-cover bg-center">
        <div class="w-full h-full flex flex-col justify-center items-center gap-8">
            <h1 class="w-120 poppins-semibold text-white text-5xl text-center">
                HATMA WEDDING ORGANIZER
            </h1>
            <input type="text" placeholder="Search..."
                class="border border-dashed border-gray-300
                    w-1/3 px-4 py-1 inter text-white text-2xl rounded-full">
        </div>
    </div>

    <!-- Container -->
    <div class="border border-dashed border-gray-700 h-120">

        <!-- Header -->
        <div class="border border-dashed border-gray-700
            py-1 flex justify-between items-center">
            <div class="flex gap-3 items-center">
                <span class="bg-gray-700 w-3 h-3 rounded-full"></span>
                <h2 class="text-gray-700 poppins-semibold text-3xl">Paket Pernikahan</h2>
            </div>
            <a href="#" class="underline inter-italic">Lebih banyak...</a>
        </div>
    
        <!-- Card -->
        <div class="border-sketch w-fit flex flex-col rounded-xl">
            <x-card.thumbnail src="{{ asset('../public/images/flower-red-night.jpg') }}" alt="Thumbnail" />
            <div class="flex flex-col px-3 py-1">
                <x-card.title>Nama paket</x-card.title>
                <x-container.tags>
                    <x-card.tag href="#">Tag</x-card.tag>
                    <x-card.tag href="#">Tag</x-card.tag>
                </x-container.tags>
                <x-card.price>Rp. 100.XXX.XXX - Rp. 200.XXX.XXX</x-card.price>
            </div>
        </div>

    </div>

    <!-- Container -->
    <div class="border border-dashed border-gray-700 h-120">
        <div class="flex h-full">
            <div class="w-1/2 bg-[url('/public/images/grass-snow.jpg')] bg-cover bg-center"></div>
            <div class="w-1/2 flex flex-col justify-center items-center space-y-4">
                <h1 class="border border-dashed border-gray-700
                    w-140 poppins-semibold text-4xl text-slate-700 text-center">
                    BUAT KERJASAMA DENGAN HATMA WEDDING ORGANIZER
                </h1>
                <a href="{{ route('customer.request_mitra.create') }}" class="px-4 py-1 poppins-semibold text-xl text-white bg-gray-400 rounded-md">DAFTAR</a>
            </div>
        </div>
    </div>

    <!-- Container -->
    <div class="border border-dashed border-gray-700 h-120">

        <!-- Header -->
        <div class="border border-dashed border-gray-700
            py-1 flex justify-between items-center">
            <div class="flex gap-3 items-center">
                <span class="bg-gray-700 w-3 h-3 rounded-full"></span>
                <h2 class="text-gray-700 poppins-semibold text-3xl">Ulasan</h2>
            </div>
            <a href="#" class="underline inter-italic">Lebih banyak...</a>
        </div>

        <!-- Card container -->
        <div class="border border-dashed border-gray-700
            flex flex-row justify-center space-x-4 mt-4">
            <!-- Card -->
            <div class="border border-dashed border-gray-700 w-105 rounded-xl">
    
                <img src="{{ asset('../public/images/flower-red-winter.jpg') }}" alt="Thumbnail" class="w-full h-56 object-cover rounded-t-xl">
    
                <div class="flex flex-col px-3 py-3 gap-4">
                    <p class="inter-medium text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod fugit laboriosam rerum aliquid hic veniam voluptatum assumenda delectus, sed beatae.
                    </p>
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('../public/images/cat-girl.jpg') }}" alt="profile" class="w-9 h-9 object-cover rounded-full">
                        <h3 class="poppins-medium text-lg">Username</h3>
                    </div>
                </div>
    
            </div>
            <!-- Card -->
            <div class="border border-dashed border-gray-700 w-105 rounded-xl">
    
                <img src="{{ asset('../public/images/flower-red-winter.jpg') }}" alt="Thumbnail" class="w-full h-56 object-cover rounded-t-xl">
    
                <div class="flex flex-col px-3 py-3 gap-4">
                    <p class="inter-medium text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod fugit laboriosam rerum aliquid hic veniam voluptatum assumenda delectus, sed beatae.
                    </p>
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('../public/images/cat-girl.jpg') }}" alt="profile" class="w-9 h-9 object-cover rounded-full">
                        <h3 class="poppins-medium text-lg">Username</h3>
                    </div>
                </div>
    
            </div>
        </div>

    </div>

    <!-- Footer -->
    <div class="border border-dashed border-gray-700 h-67">
    </div>

    <!-- Copyright -->
    <div class="border border-dashed border-gray-700
        py-2 flex justify-center items-center">
        <p class="lora text-sm text-center">Copyright 2025</p>
    </div>

</x-layout>