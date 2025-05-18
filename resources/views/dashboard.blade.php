<x-layout-dashboard>
    <x-slot:heading>
        Dashboard
    </x-slot:heading>

    <!-- Card -->
    <div class="w-full flex gap-6">
        <a href="{{ route('admin.request_mitra.index') }}" class="w-full bg-slate-200 flex justify-center items-center px-4 py-2 gap-1 shadow shadow-slate-500 transition delay-50 duration:300 hover:bg-slate-300">
            <span class="text-slate-700 text-6xl text-center material-symbols-outlined">contract</span>
            <div class="flex flex-col">
                <span class="poppins-semibold text-slate-700 text-xl">Permintaan</span>
                <span class="poppins-semibold text-slate-700 text-xl">{{ $jumlahPermintaan }}</span>
            </div>
        </a>

        <a href="{{ route('admin.kerjasama.index') }}" class="w-full bg-slate-200 flex justify-center items-center px-4 py-2 gap-1 shadow shadow-slate-500 transition delay-50 duration:300 hover:bg-slate-300">
            <span class="text-slate-700 text-6xl text-center material-symbols-outlined">handshake</span>
            <div class="flex flex-col">
                <span class="poppins-semibold text-slate-700 text-xl">Kerjasama</span>
                <span class="poppins-semibold text-slate-700 text-xl">{{ $jumlahKerjasama }}</span>
            </div>
        </a>

        <a href="{{ route('admin.pesanan.index') }}" class="w-full bg-slate-200 flex justify-center items-center px-4 py-2 gap-1 shadow shadow-slate-500 transition delay-50 duration:300 hover:bg-slate-300">
            <span class="text-slate-700 text-6xl text-center material-symbols-outlined">shoppingmode</span>
            <div class="flex flex-col">
                <span class="poppins-semibold text-slate-700 text-xl">Pesanan</span>
                <span class="poppins-semibold text-slate-700 text-xl">{{ $jumlahPesanan }}</span>
            </div>
        </a>

        <a href="{{ route('admin.pembayaran.index') }}" class="w-full bg-slate-200 flex justify-center items-center px-4 py-2 gap-1 shadow shadow-slate-500 transition delay-50 duration:300 hover:bg-slate-300">
            <span class="text-slate-700 text-6xl text-center material-symbols-outlined">payments</span>
            <div class="flex flex-col">
                <span class="poppins-semibold text-slate-700 text-xl">Pembayaran</span>
                <span class="poppins-semibold text-slate-700 text-xl">{{ $jumlahPembayaran }}</span>
            </div>
        </a>
    </div>

    <!-- Table -->
    <div class="w-full bg-slate-200 flex flex-col shadow shadow-slate-500">
        <div class="w-full flex justify-between items-center px-4 py-1 border-b-2 border-slate-500">
            <span class="poppins-semibold text-slate-700 text-2xl">Akun</span>
            <a href="#" class="inline-block poppins-semibold text-slate-700 text-2xl hover:text-teal-500">></a>
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
            <a href="#" class="inline-block inter-italic text-slate-700 text-center italic underline hover:text-teal-500">Lebih banyak ></a>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-3">
        <x-table.container variant="main">
            <x-table.container variant="heading">
                <span class="poppins-semibold text-slate-700 text-2xl">Bank</span>
                <a href="#" class="inline-block poppins-semibold text-slate-700 text-2xl hover:text-teal-500">></a>
            </x-table.container>
    
            <x-table.container variant="table">
                <table>
                    <thead>
                        <tr>
                            <x-table.td variant="head">No.</x-table.td>
                            <x-table.td variant="head">Bank</x-table.td>
                            <x-table.td variant="head">No. Rekening</x-table.td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banks as $bank)
                            <x-table.tr variant="body">
                                <x-table.td class="px-4!">{{ $loop->iteration }}</x-table.td>
                                <x-table.td>{{ $bank->nama_bank }}</x-table.td>
                                <x-table.td>{{ $bank->no_rekening }}</x-table.td>
                            </x-table.tr>
                        @endforeach
                    </tbody>
                </table>
            </x-table.container>
            
            <x-table.container variant="footing" class="flex justify-center">
                <a href="#" class="inline-block inter-italic text-slate-700 text-center italic underline hover:text-teal-500">Lebih banyak ></a>
            </x-table.container>
        </x-table.container>
    
        <x-table.container variant="main">
            <x-table.container variant="heading">
                <span class="poppins-semibold text-slate-700 text-2xl">Akun</span>
                <a href="#" class="inline-block poppins-semibold text-slate-700 text-2xl hover:text-teal-500">></a>
            </x-table.container>
    
            <x-table.container variant="table">
                <table>
                    <thead>
                        <tr>
                            <x-table.td variant="head" class="px-4!">No.</x-table.td>
                            <x-table.td variant="head">Username</x-table.td>
                            <x-table.td variant="head">Role</x-table.td>
                            <x-table.td variant="head">Email</x-table.td>
                            <x-table.td variant="head">Password</x-table.td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($akuns as $akun)
                            <x-table.tr variant="body">
                                <x-table.td class="px-4!">{{ $loop->iteration }}</x-table.td>
                                <x-table.td>{{ $akun->name }}</x-table.td>
                                <x-table.td>{{ $akun->role }}</x-table.td>
                                <x-table.td>{{ $akun->email }}</x-table.td>
                                <x-table.td>{{ $akun->password }}</x-table.td>
                            </x-table.tr>
                        @endforeach
                    </tbody>
                </table>
            </x-table.container>
    
            <x-table.container variant="footing" class="flex justify-center">
                <a href="#" class="inline-block inter-italic text-slate-700 text-center italic underline hover:text-teal-500">Lebih banyak ></a>
            </x-table.container>
        </x-table.container>
    </div>
</x-layout-dashboard>