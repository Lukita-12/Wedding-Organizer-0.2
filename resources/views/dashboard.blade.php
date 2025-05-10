<x-layout>
    <div class="flex">

        <aside class="w-64 min-h-screen bg-slate-700 flex flex-col justify-between items-center px-3 py-3">
            <x-sidebar.container variant="content">
                <span class="poppins-semibold text-slate-100 text-2xl">LOGO's</span>
                <span class="w-full border border-slate-100"></span>
                <nav class="w-full flex flex-col gap-1">
                    <x-sidebar.nav-link href="#">Dashboard</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="#">Permintaan</x-sidebar.nav-link>
                    <x-sidebar.nav-link href="#">Kerjasama</x-sidebar.nav-link>
                </nav>
            </x-sidebar.container>
    
            <x-sidebar.container>
                <form method="POST" action="#">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 poppins-semibold text-slate-100 text-lg px-3 py-1">Log Out</button>
                </form>
            </x-sidebar.container>
        </aside>
    
        <main class="flex-1 overflow-y-auto">
            <div class="sticky top-0 left-0 w-full bg-slate-200 flex justify-end items-center shadow shadow-slate-700 px-4 py-1">
                <img src="{{ asset('images/profile-ad.png') }}" alt="" class="w-9 h-9 object-cover rounded-full">
            </div>

            <div class="w-full flex flex-col px-4 py-4 gap-4">

                <!-- Card -->
                <x-card.container variant="small-main">
                    <x-card.card-link variant="small-card" href="{{ route('admin.request_mitra.index') }}">
                        <x-card.span variant="small-icon" class="material-symbols-outlined">contract</x-card.span>
                        <x-card.container variant="small-content">
                            <x-card.span variant="small-title">Permintaan</x-card.span>
                            <x-card.span variant="small-number">0</x-card.span>
                        </x-card.card-link>
                    </x-card.container>

                    <x-card.card-link variant="small-card" href="{{ route('admin.kerjasama.index') }}">
                        <x-card.span variant="small-icon" class="material-symbols-outlined">handshake</x-card.span>
                        <x-card.container variant="small-content">
                            <x-card.span variant="small-title">Kerjasama</x-card.span>
                            <x-card.span variant="small-number">0</x-card.span>
                        </x-card.card-link>
                    </x-card.container>

                    <x-card.card-link variant="small-card" href="{{ route('admin.pesanan.index') }}">
                        <x-card.span variant="small-icon" class="material-symbols-outlined">shoppingmode</x-card.span>
                        <x-card.container variant="small-content">
                            <x-card.span variant="small-title">Pesanan</x-card.span>
                            <x-card.span variant="small-number">0</x-card.span>
                        </x-card.card-link>
                    </x-card.container>

                    <x-card.card-link variant="small-card" href="{{ route('admin.pembayaran.index') }}">
                        <x-card.span variant="small-icon" class="material-symbols-outlined">payments</x-card.span>
                        <x-card.container variant="small-content">
                            <x-card.span variant="small-title">Permbayaran</x-card.span>
                            <x-card.span variant="small-number">0</x-card.span>
                        </x-card.card-link>
                    </x-card.container>
                </x-card.container>

                <!-- Table -->
                <div class="w-full bg-slate-200 flex flex-col shadow shadow-slate-700">
                    <div class="w-full flex justify-between items-center px-4 py-1 border-b-2 border-slate-500">
                        <span class="poppins-semibold text-slate-700 text-2xl">Akun</span>
                        <span class="poppins-semibold text-slate-700 text-2xl">></span>
                    </div>

                    <div class="">
                        <table class="table-auto">
                            <thead>
                                <tr>
                                    <td class="poppins-semibold text-slate-700 text-center text-lg px-4 py-2 whitespace-nowrap">No.</td>
                                    <td class="poppins-semibold text-slate-700 text-center text-lg px-12 py-2 whitespace-nowrap">Username</td>
                                    <td class="poppins-semibold text-slate-700 text-center text-lg px-12 py-2 whitespace-nowrap">Role</td>
                                    <td class="poppins-semibold text-slate-700 text-center text-lg px-12 py-2 whitespace-nowrap">Email</td>
                                    <td class="poppins-semibold text-slate-700 text-center text-lg px-12 py-2 whitespace-nowrap">Password</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($akuns as $akun)
                                <tr class="odd:bg-slate-100 even:bg-slate-200">
                                    <td class="poppins text-slate-700 text-center px-4 py-2 whitespace-nowrap">{{ $loop->iteration }}</td>
                                    <td class="poppins text-slate-700 text-center px-12 py-2 whitespace-nowrap">{{ $akun->name }}</td>
                                    <td class="poppins text-slate-700 text-center px-12 py-2 whitespace-nowrap">{{ $akun->role }}</td>
                                    <td class="poppins text-slate-700 text-center px-12 py-2 whitespace-nowrap">{{ $akun->email }}</td>
                                    <td class="poppins text-slate-700 text-center px-12 py-2 whitespace-nowrap">{{ $akun->password }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="w-full flex justify-center px-3 py-3">
                        <a href="#" class="inline-block inter-italic text-slate-700 text-center italic underline">Lebih banyak ></a>
                    </div>
                </div>

                <!-- Double table -->
                <div class="w-full flex gap-4">
                    <div class="w-1/2 bg-slate-200 flex flex-col shadow shadow-slate-700">
                        <div class="">
                            <table class="">
                                <thead>
                                    <tr>
                                        <td class="">No.</td>
                                        <td class="">Username</td>
                                        <td class="">Role</td>
                                        <td class="">Email</td>
                                        <td class="">Password</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($akuns as $akun)
                                    <tr class="odd:bg-slate-100 even:bg-slate-200">
                                        <td class="">{{ $loop->iteration }}</td>
                                        <td class="">{{ $akun->name }}</td>
                                        <td class="">{{ $akun->role }}</td>
                                        <td class="">{{ $akun->email }}</td>
                                        <td class="">{{ $akun->password }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="w-1/2 bg-slate-200 flex flex-col shadow shadow-slate-700">
                        <div class="">
                            <table class="">
                                <thead>
                                    <tr>
                                        <td class="">No.</td>
                                        <td class="">Username</td>
                                        <td class="">Role</td>
                                        <td class="">Email</td>
                                        <td class="">Password</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($akuns as $akun)
                                    <tr class="odd:bg-slate-100 even:bg-slate-200">
                                        <td class="">{{ $loop->iteration }}</td>
                                        <td class="">{{ $akun->name }}</td>
                                        <td class="">{{ $akun->role }}</td>
                                        <td class="">{{ $akun->email }}</td>
                                        <td class="">{{ $akun->password }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </main>

    </div>
</x-layout>