<aside class="bg-slate-700 flex flex-col w-64 justify-between items-center shadow shadow-slate-700 px-4 py-6">
    <div class="w-full">
        <div class="w-full h-12 bg-[url('/public/images/landscape-panoramic.jpg')] bg-cover bg-center flex flex-col rounded-full">
            <h1 class="poppins-semibold text-slate-100 text-2xl text-center">HATMA</h1>
            <span class="lora text-slate-100 text-xs text-center">Wedding Organizer</span>
            <!-- <img src="{{ asset('../public/images/landscape-panoramic.jpg') }}" alt="" class="object-cover"> -->
        </div>

        <nav class="flex flex-col space-y-1 mt-4">
            <x-sidebar.nav-link href="{{ url('/dashboard') }}">Dashboard</x-sidebar.nav-link>
            <x-sidebar.nav-link href="#">Akun</x-sidebar.nav-link>
            <x-sidebar.nav-link href="{{ route('admin.bank.index') }}">Bank</x-sidebar.nav-link>
            <x-sidebar.nav-link href="{{ route('admin.request_mitra.index') }}">Permintaan</x-sidebar.nav-link>
            <x-sidebar.nav-link href="{{ route('admin.kerjasama.index') }}">Kerjasama</x-sidebar.nav-link>
            <x-sidebar.nav-link href="{{ route('admin.pesanan.index') }}">Pesanan</x-sidebar.nav-link>
            <x-sidebar.nav-link href="{{ route('admin.pembayaran.index') }}">Pembayaran</x-sidebar.nav-link>
        </nav>
    </div>

    <div class="w-full">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="bg-red-500 w-full px-3 py-1 poppins-semibold text-slate-100 text-lg rounded-md">
                Log out
            </button>
        </form>
    </div>
</aside>