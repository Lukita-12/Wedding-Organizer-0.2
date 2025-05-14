<x-layout>
    <div class="flex justify-between items-center px-4 py-1">
        <nav class="flex gap-1">
            <a href="{{ route('home') }}" class="border border-dashed poppins-medium text-slate-700 text-lg px-3">Home</a>
            <a href="{{ route('home') }}" class="border border-dashed poppins-medium text-slate-700 text-lg px-3">Kerjasama</a>
        </nav>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="poppins-semibold bg-red-500 text-slate-100 text-lg px-3 py-1 transition delay-50 duration:300 hover:bg-red-700">Log Out</button>
        </form>
    </div>

    <div class="w-full h-135 bg-[url('/public/images/flower-red-winter.jpg')] bg-cover bg-center flex flex-col justify-center items-center">
        <div class="backdrop-blur-sm w-full flex flex-col items-center py-4 gap-3">
            <span class="w-md poppins-bold text-slate-100 text-center text-5xl">HATMA WEDDING ORGANIZER</span>
            <span class="my-3"></span>
            <a href="{{ route('customer.pesanan.create') }}" class="w-3xs poppins-semibold bg-teal-500/80 text-slate-100 text-3xl text-center px-3 py-1 transition delay-50 duration-300 hover:bg-teal-700">PESAN</a>
        </div>
    </div>

    <div class="w-full h-108 flex">
        <div class="w-full h-full bg-[url('/public/images/snowing.jpg')] bg-cover bg-center"></div>

        <div class="w-full flex flex-col justify-center items-center gap-5">
            <span class="w-xl poppins-semibold text-slate-700 text-4xl text-center px-3 py-1">BUAT KERJASAMA DENGAN HATMA WEDDING ORGANIZER</span>
            @auth
                <a href="{{ route('customer.request_mitra.create') }}" class="w-1/4 poppins-semibold bg-teal-500 text-slate-100 text-2xl text-center px-3 py-1 transition delay-50 duration-300 hover:bg-teal-700">DAFTAR</a>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="w-1/4 poppins-semibold bg-teal-500 text-slate-100 text-2xl text-center px-3 py-1 transition delay-50 duration-300 hover:bg-teal-700">Log In</a>
            @endguest
        </div>
    </div>

    <div class="w-full h-108 grid grid-cols-2 px-4 py-2 gap-3 overflow-y-auto">
        @foreach ($kerjasamas as $kerjasama)
            <div class="h-fit bg-slate-200 flex justify-between items-end shadow shadow-slate-500/80 px-3 py-1">
                <div class="flex flex-col">
                    <span class="poppins-medium text-slate-700 text-lg">{{ $kerjasama->requestMitra->nama_usaha ?? '-' }}</span>
                    <span class="poppins text-slate-700 text-sm">{{ $kerjasama->requestMitra->nama_pemilik ?? '-' }}</span>
                    <span class="poppins text-slate-700 text-sm mt-3">{{ $kerjasama->requestMitra->jenis_usaha ?? '-' }}</span>
                </div>

                <a href="{{ route('customer.kerjasama.edit', $kerjasama) }}" class="inline-block poppins-semibold bg-teal-500 text-slate-100 text-center px-3 py-1 transition delay-50 duration-300 hover:bg-teal-700">
                    Edit
                </a>
            </div>
        @endforeach
    </div>

</x-layout>