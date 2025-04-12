<aside class="flex flex-col bg-gray-600/50 w-64 justify-between items-center shadow-lg px-6 py-8">
    <div class="w-full">
        <div class="flex justify-center border border-dashed rounded-lg">
            <h1 class="text-2xl font-bold text-gray-800">LOGO</h1>
        </div>
        <nav class="flex flex-col space-y-1 mt-4">
            <a href="#" class="poppins-medium text-gray-700 border border-dashed px-4 py-2 rounded-full transition">Dashboard</a>
            <a href="#" class="poppins-medium text-gray-700 border border-dashed px-4 py-2 rounded-full transition">Akun</a>
            <a href="{{ route('admin.kerjasama.index') }}"
                class="poppins-medium text-gray-700 border border-dashed px-4 py-2 rounded-full transition">
                Kerjasama
            </a>
        </nav>
    </div>
    <div class="w-full">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full px-4 py-2 bg-red-500 text-white rounded-lg">
                Log out
            </button>
        </form>
    </div>
</aside>