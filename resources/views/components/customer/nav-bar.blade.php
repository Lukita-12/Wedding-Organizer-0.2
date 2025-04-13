<div class="border border-dashed border-gray-700
    py-2 flex justify-between items-center">
    <nav class="flex gap-1">
        <a href="{{ url('/home') }}" class="border border-dashed border-gray-700
                px-2 poppins text-lg text-center rounded-sm">
            Home
        </a>
        <a href="{{ route('customer.kerjasama.index') }}" class="border border-dashed border-gray-700
                px-2 poppins text-lg text-center rounded-sm">
            Kerjasama
        </a>
        <a href="#" class="border border-dashed border-gray-700
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
                <a href="{{ route('register') }}"
                    class="bg-gray-400 text-white px-4 py-1 inline-block poppins-medium text-lg text-center rounded-md">
                    Register
                </a>
                <a href="{{ route('login') }}"
                    class="bg-gray-400 text-white px-4 py-1 inline-block poppins-medium text-lg text-center rounded-md">
                    Log in
                </a>
            @endguest
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="bg-gray-400 text-white px-4 py-1 inline-block poppins-medium text-lg text-center rounded-md">
                        Log out
                    </button>
                </form>
            @endauth
    </div>
</div>