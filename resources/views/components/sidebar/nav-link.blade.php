<nav class="flex flex-col space-y-1 mt-4">
    <a href="{{ url('/dashboard') }}" class="border-sketch-white text-white-sketch poppins-medium px-4 py-2 rounded-full transition">Dashboard</a>
    <a href="{{ route('admin.request_mitra.index') }}" class="border-sketch-white text-white-sketch poppins-medium px-4 py-2 rounded-full transition">Permintaan</a>
    <a href="{{ route('admin.kerjasama.index') }}" class="border-sketch-white text-white-sketch poppins-medium px-4 py-2 rounded-full transition">Kerjasama</a>
    <a href="{{ route('admin.pesanan.index') }}" class="border-sketch-white text-white-sketch poppins-medium px-4 py-2 rounded-full transition">Pesanan</a>
    <a href="{{ route('admin.pembayaran.index') }}" class="border-sketch-white text-white-sketch poppins-medium px-4 py-2 rounded-full transition">Pembayaran</a>
</nav>