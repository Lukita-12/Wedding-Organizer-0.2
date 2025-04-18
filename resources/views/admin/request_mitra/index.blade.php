<x-layout>

    <x-container.dashboard>
        <x-sidebar.sidebar />

        <x-container.main>
            <div class="bg-slate-200 w-full flex px-3 py-1 justify-between items-center shadow-md shadow-slate-400">
                <input type="text" placeholder="Search..." class="bg-slate-100 px-4 py-1 inter rounded-full">
                <div class="flex items-center gap-2">
                    @guest
                        <a href="{{ route('register') }}" class="inline-block bg-teal-500 px-3 py-1 poppins-semibold text-center text-slate-100 rounded-lg">Register</a>
                        <a href="{{ route('login') }}" class="inline-block bg-red-500 px-3 py-1 poppins-semibold text-center text-slate-100 rounded-lg">Log In</a>
                    @endguest
                    @auth
                        <img src="{{ asset('../public/images/profile-ad.png') }}" alt="Profile" class="w-9 h-9 rounded-full">
                    @endauth
                </div>
            </div>

            <div class="bg-slate-200 rounded-lg shadow-md shadow-slate-500/80">
                <div class="px-3 py-1 flex justify-between">
                    <div class="flex items-center gap-2">
                        <span class="bg-slate-700 w-2 h-2 rounded-full"></span>
                        <h1 class="text-slate-700 poppins-semibold text-xl">Permintaan Kerjasama</h1>
                        <a href="#" class="inline-block bg-teal-500 px-3 py-1 poppins-medium text-slate-100 rounded-full" hidden>+ Baru</a>
                    </div>
                    <div class="flex gap-2 items-center">
                        <div class="flex items-center gap-2" hidden>
                            <label for="filter_status" class="poppins-medium text-teal-500">Filter status:</label>
                            <select name="" id="" class="border border-teal-500 poppins text-slate-700 rounded-sm">
                                <option value="">Terbaru</option>
                                <option value="">Terlama</option>
                                <option value="">Diterima</option>
                                <option value="">Ditolak</option>
                            </select>
                        </div>
                        <input type="text" placeholder="Search..." class="bg-slate-100 px-4 py-1 inter rounded-full">
                        <button type="submit" class="bg-teal-500 px-3 py-1 poppins-medium text-slate-100 rounded-full">Cari</button>
                    </div>
                </div>

                <div class="w-full overflow-x-auto">
                    <table class="table-auto min-w-full">
                        <thead class="bg-slate-100">
                            <tr class="border-b border-slate-500">
                                <th class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">No.</th>
                                <th class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">Nama Pelanggan</th>
                                <th class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">Nama Usaha</th>
                                <th class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">Jenis Usaha</th>
                                <th class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">Nama Pemilik</th>
                                <th class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">Status Permintaan</th>
                                <th class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requestMitras as $requestMitra)
                                <tr class="odd:bg-slate-200 even:bg-slate-100">
                                    <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">{{ $loop->iteration }}</td>
                                    <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">{{ $requestMitra->pelanggan->nama_pelanggan }}</td>
                                    <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">{{ $requestMitra->nama_usaha }}</td>
                                    <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">{{ $requestMitra->jenis_usaha }}</td>
                                    <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">{{ $requestMitra->nama_pemilik }}</td>
                                    <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">{{ $requestMitra->status_request }}</td>
                                    <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">
                                        <div class="w-full flex justify-center gap-2">
                                            <form method="POST" action="{{ route('admin.request_mitra.accept', $requestMitra->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="border border-teal-500 px-3 poppins text-teal-500 text-sm rounded-full">Terima</button>
                                            </form>
                                            
                                            <form method="POST" action="{{ route('admin.request_mitra.reject', $requestMitra->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="border border-red-500 px-3 poppins text-red-500 text-sm rounded-full transition duration:250 hover:bg-red-500 hover:text-slate-100">Tolak</button>
                                            </form>
        
                                            <a href="#" class="inline-block border border-green-500 px-3 poppins text-green-500 text-sm rounded-full">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="px-3 py-2">
                    {{ $requestMitras->links() }}
                </div>
            </div>
        </x-container.main>
    </x-container.dashboard>

</x-layout>