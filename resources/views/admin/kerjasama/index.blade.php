<x-layout>

    <div class="h-screen flex flex-col justify-center">
        <div class="bg-slate-200 rounded-lg shadow shadow-slate500/80">
            <!-- Header -->
            <div class="bg-slate-200 px-4 py-1 flex justify-between items-center rounded-t-lg">
                <div class="flex items-center gap-4">
                    <span class="bg-slate-700 w-2 h-2 rounded-full"></span>
                    <h1 class="text-slate-700 poppins-semibold text-xl">Kerjasama</h1>
                    <a href="{{ route('admin.kerjasama.create') }}" class="inline-block bg-teal-500 px-3 py-1 poppins-semibold text-sm text-slate-100 rounded-full">+ Baru</a>
                </div>
                <div class="flex items-center gap-4">
                    <input type="text" placeholder="Search..." class="bg-slate-100 px-4 py-1 inter rounded-full">
                    <div class="flex items-center">
                        <label for="filter_status" class="poppins-medium text-teal-500">Filter status:</label>
                        <select name="filter_status" id="filter_status" class="outline-none poppins text-slate-700 rounded-sm">
                            <option value="Terbaru">Terbaru</option>
                            <option value="Terlama">Terlama</option>
                        </select>
                    </div>
                </div>
            </div>
        
            <!-- Table -->
             <div class="w-full overflow-auto">
                 <table class="w-full table-auto">
                     <thead class="bg-slate-100">
                         <tr>
                             <td class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">No.</td>
                             <td class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">Nama Usaha</td>
                             <td class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">Nama Pemilik</td>
                             <td class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">Jenis Usaha</td>
                             <td class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">No. Telpon</td>
                             <td class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">Email</td>
                             <td class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">Alamat</td>
                             <td class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">Harga 01</td>
                             <td class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">Keterangan Harga 01</td>
                             <td class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">Harga 02</td>
                             <td class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">Keterangan Harga 02</td>
                             <td class="px-12 py-2 text-slate-700 poppins-semibold text-lg text-center whitespace-nowrap">Aksi</td>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($kerjasamas as $kerjasama)
                             <tr onclick="window.location='{{ route('admin.kerjasama.show', $kerjasama) }}'" class="cursor-pointer odd:bg-teal-300/20 even:bg-slate-100 odd:hover:bg-teal-500/30 even:hover:bg-teal-500/30">
                                 <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">{{ $loop->iteration }}</td>
                                 <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">{{ $kerjasama->requestMitra->nama_usaha }}</td>
                                 <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">{{ $kerjasama->requestMitra->nama_pemilik }}</td>
                                 <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">{{ $kerjasama->requestMitra->jenis_usaha }}</td>
                                 <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">{{ $kerjasama->noTelp_usaha }}</td>
                                 <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">{{ $kerjasama->email_usaha }}</td>
                                 <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">{{ $kerjasama->alamat_usaha }}</td>
                                 <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">Rp. {{ number_format($kerjasama->harga01, 0, ',', '.') }}</td>
                                 <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">{{ $kerjasama->ket_harga01 }}</td>
                                 <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">Rp. {{ number_format($kerjasama->harga02, 0, ',', '.') }}</td>
                                 <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">{{ $kerjasama->ket_harga02 }}</td>
                                 <td class="px-12 py-2 text-slate-700 poppins text-center whitespace-nowrap">
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('admin.kerjasama.edit', $kerjasama) }}" class="inline-block bg-slate-400 px-3 py-1 text-slate-100 text-sm rounded-full">Edit</a>
                                        <form method="POST" action="{{ route('admin.kerjasama.destroy', $kerjasama) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-slate-400 px-3 py-1 text-slate-100 text-sm rounded-full">Hapus</button>
                                        </form>
                                    </div>
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
        
            <!-- Footer -->
            <div class="h-14 px-3 py-2">
                {{ $kerjasamas->links() }}
            </div>
        </div>
    </div>

    <div class="hidden">
        <div class="bg-slate-200 rounded-lg shadow-md shadow-slate-500/80">
            <div>
                <h2>Header</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Nama pemilik</td>
                        <td>Nama Usaha</td>
                        <td>Jenis Usaha</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kerjasamas as $kerjasama)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kerjasama->requestMitra->nama_pemilik }}</td>
                        <td>{{ $kerjasama->requestMitra->nama_usaha }}</td>
                        <td>{{ $kerjasama->requestMitra->jenis_usaha }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $kerjasamas->links() }}
            </div>
        </div>
    
        <div class="border-sketch rounded-lg hidden">
    
            <x-header.container>
                <div class="flex items-center gap-3">
                    <x-header.span-dot />
                    <x-header.h1>KERJASAMA</x-header.h1>
                    <x-header.button-link href="{{ route('admin.kerjasama.create') }}">+ Baru</x-header.button-link>
                </div>
                <div>
                    <x-header.search />
                </div>
            </x-header.container>
    
            <x-table.table>
                <x-table.thead>
                    <x-table.tr>
                        <x-table.td>No.</x-table.td>
                        <x-table.td>Nama pemilik</x-table.td>
                        <x-table.td>Nama Usaha</x-table.td>
                        <x-table.td>Jenis Usaha</x-table.td>
                        <x-table.td>Telpon/WA</x-table.td>
                        <x-table.td>Email</x-table.td>
                        <x-table.td>Alamat</x-table.td>
                        <x-table.td>Harga 01</x-table.td>
                        <x-table.td>Ket. Harga 01</x-table.td>
                        <x-table.td>Harga 02</x-table.td>
                        <x-table.td>Ket. Harga 02</x-table.td>
                        <x-table.td>Aksi</x-table.td>
                    </x-table.tr>
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($kerjasamas as $index => $kerjasama)
                    <x-table.tr>
                        <x-table.td>{{ $index + 1 }}</x-table.td>
                        <x-table.td>{{ $kerjasama->nama_pemilik }}</x-table.td>
                        <x-table.td>{{ $kerjasama->nama_usaha }}</x-table.td>
                        <x-table.td>{{ $kerjasama->jenis_usaha }}</x-table.td>
                        <x-table.td>{{ $kerjasama->noTelp_usaha }}</x-table.td>
                        <x-table.td>{{ $kerjasama->email_usaha }}</x-table.td>
                        <x-table.td>{{ $kerjasama->alamat_usaha }}</x-table.td>
                        <x-table.td>Rp. {{ number_format($kerjasama->harga01, 0, ',', '.') }}</x-table.td>
                        <x-table.td>{{ $kerjasama->ket_harga01 }}</x-table.td>
                        <x-table.td>Rp. {{ number_format($kerjasama->harga02, 0, ',', '.') }}</x-table.td>
                        <x-table.td>{{ $kerjasama->ket_harga02 }}</x-table.td>
                        <x-table.td>
                            <x-table.button-link href="{{ route('admin.kerjasama.show', $kerjasama->id) }}">Lihat
                            </x-table.button-link>
                        </x-table.td>
                    </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
    
            <x-container.pagination>
                {{ $kerjasamas->links() }}
            </x-container.pagination>
    
        </div>
    </div>

</x-layout>