<x-header.container>
    <x-header.search />
    
    <div class="flex gap-3">
        @guest
            <x-header.button-link href="{{ route('login') }}">Login</x-header.button-link>
            <x-header.button-link href="{{ route('register') }}">Register</x-header.button-link>
        @endguest
        @auth
            <x-header.profile-img src="{{ asset('../public/images/profile-ad.png') }}" alt="profile" />
        @endauth
    </div>
</x-header.container>