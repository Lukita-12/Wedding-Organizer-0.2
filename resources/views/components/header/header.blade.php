<div class="bg-slate-200 w-full flex px-3 py-1 justify-between items-center shadow-md shadow-slate-400">
    <x-header.search type="text" placeholder="Search..." />
    <div class="w-full flex justify-end items-center gap-2">
        @guest
            <x-header.button-link href="{{ route('register') }}" class="bg-teal-500 w-1/8 transitions duration-250 hover:bg-teal-700 hover:ring-2 hover:ring-offset-2 hover:ring-teal-500">
                Register</x-header.button-link>
            <x-header.button-link href="{{ route('login') }}" class="bg-red-500 w-1/8 transitions duration-250 hover:bg-red-700 hover:ring-2 hover:ring-offset-2 hover:ring-red-500">
                Log In</x-header.button-link>
        @endguest
        @auth
            <x-header.profile-img src="{{ asset('../public/images/profile-ad.png') }}" alt="Profile" />
        @endauth
    </div>
</div>