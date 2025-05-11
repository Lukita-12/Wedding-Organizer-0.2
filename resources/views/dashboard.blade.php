<x-layout-dashboard>

        <div class="w-full flex flex-col px-6 py-6 gap-8">

            <!-- Card -->
            <x-card.container variant="small-main" class="hidden">
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

            <!-- Card -->
            <div class="w-full flex gap-6">
                <a href="{{ route('admin.request_mitra.index') }}" class="w-full bg-slate-200 flex justify-center items-center px-4 py-2 gap-1 shadow shadow-slate-500 transition delay-50 duration:300 hover:bg-slate-300">
                    <span class="text-slate-700 text-6xl text-center material-symbols-outlined">contract</span>
                    <div class="flex flex-col">
                        <span class="poppins-semibold text-slate-700 text-xl">Permintaan</span>
                        <span class="poppins-semibold text-slate-700 text-xl">0</span>
                    </div>
                </a>

                <a href="{{ route('admin.kerjasama.index') }}" class="w-full bg-slate-200 flex justify-center items-center px-4 py-2 gap-1 shadow shadow-slate-500 transition delay-50 duration:300 hover:bg-slate-300">
                    <span class="text-slate-700 text-6xl text-center material-symbols-outlined">handshake</span>
                    <div class="flex flex-col">
                        <span class="poppins-semibold text-slate-700 text-xl">Kerjasama</span>
                        <span class="poppins-semibold text-slate-700 text-xl">0</span>
                    </div>
                </a>
            </div>

            <!-- Table -->
            <div class="w-full bg-slate-200 flex flex-col shadow shadow-slate-500">
                <div class="w-full flex justify-between items-center px-4 py-1 border-b-2 border-slate-500">
                    <span class="poppins-semibold text-slate-700 text-2xl">Akun</span>
                    <a href="#" class="inline-block poppins-semibold text-slate-700 text-2xl">></a>
                </div>

                <div class="overflow-auto">
                    <table>
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
                                    <td class="poppins text-slate-700 text-center px-4 py-3 whitespace-nowrap">{{ $loop->iteration }}</td>
                                    <td class="poppins text-slate-700 text-center px-12 py-3 whitespace-nowrap">{{ $akun->name }}</td>
                                    <td class="poppins text-slate-700 text-center px-12 py-3 whitespace-nowrap">{{ $akun->role }}</td>
                                    <td class="poppins text-slate-700 text-center px-12 py-3 whitespace-nowrap">{{ $akun->email }}</td>
                                    <td class="poppins text-slate-700 text-center px-12 py-3 whitespace-nowrap">{{ $akun->password }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="w-full flex justify-center px-3 py-3">
                    <a href="#" class="inline-block inter-italic text-slate-700 text-center italic underline">Lebih banyak ></a>
                </div>
            </div>

        </div>
</x-layout-dashboard>