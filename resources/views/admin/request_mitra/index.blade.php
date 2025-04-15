<x-layout>

    <x-container.admin-page>

        <x-sidebar.sidebar />

        <x-container.main>
            
            <x-header.header />

            <!-- Message -->
            <div>
                @if (session('sukses'))<div>{{ session('sukses') }}</div> @endif
            </div>
    
            <!-- Table -->
            <div class="flex flex-col items-center p-24 rounded-lg">
                <!-- Header -->
                <div class="border border-dashed border-gray-700
                    w-full px-4 py-1 flex items-center justify-between rounded-t-lg">
                    <div class="flex items-center gap-3">
                        <span class="bg-gray-700 w-3 h-3 rounded-full"></span>
                        <h1 class="poppins-semibold text-2xl">Permintaan kerjasama</h1>
                        <a href="#" class="border border-dashed border-gray-700 
                            px-3 flex items-center inline-block inter text-lg items-center rounded-full">+ Baru</a>
                    </div>
                    <div class="flex items-center gap-3">
                        <!-- Filter -->
                        <form method="GET" action="{{ route('admin.request_mitra.index') }}">
                            <label for="status_request" class="inter">Filter status:</label>
                            <select name="status_request" id="status_request"
                                class="border border-dashed border-gray-700
                                    px-3 py-1 inter rounded-full"
                                onchange="this.form.submit()">
                                <option value="">Semua</option>
                                <option value="Ditunggu" @selected(request('status_request') === 'Ditunggu')>Ditunggu</option>
                                <option value="Diterima" @selected(request('status_request') === 'Diterima')>Diterima</option>
                                <option value="Ditolak" @selected(request('status_request') === 'Ditolak')>Ditolak</option>
                            </select>
                        </form>
                        
                        <!-- Search -->
                        <form method="GET" action="{{ route('admin.request_mitra.index') }}">
                            <input type="text"
                                name="search_request"
                                value="{{ request('search_request') }}" placeholder="Search..."
                                class="border border border-dashed border-gray-700
                                    px-4 py-1 inter rounded-full" />
                                <button type="submit" class="bg-gray-700 text-white
                                    px-3 py-1 inter rounded-full hidden">Cari</button>
                        </form>
                    </div>
                </div>
    
                <table class="w-full">
                    @php
                        function sortLink($column, $label, $currentSortBy, $currentSortOrder) {
                            $newOrder = ($currentSortBy === $column && $currentSortOrder === 'asc') ? 'desc' : 'asc';
                            $query = array_merge(request()->query(), ['sort_by' => $column, 'sort_order' => $newOrder]);
                            return '<a href="' . route('admin.request_mitra.index', $query) . '" class="underline">' . $label . '</a>';
                        }
                    @endphp
                    <thead class="poppins-medium text-lg text-center">
                        <tr>
                            <td class="border border-dashed border-gray-700 px-4 py-2">No.</td>
                            <td class="border border-dashed border-gray-700 px-4 py-2">{!! sortLink('nama_usaha', 'Nama Usaha', $sortBy, $sortOrder) !!}</td>
                            <td class="border border-dashed border-gray-700 px-4 py-2">{!! sortLink('jenis_usaha', 'Jenis usaha', $sortBy, $sortOrder) !!}</td>
                            <td class="border border-dashed border-gray-700 px-4 py-2">{!! sortLink('nama_pemilik', 'Nama pemilik', $sortBy, $sortOrder) !!}</td>
                            <td class="border border-dashed border-gray-700 px-4 py-2">{!! sortLink('status_request', 'Status permintaan', $sortBy, $sortOrder) !!}</td>
                            <td class="border border-dashed border-gray-700 px-4 py-2">Aksi</td>
                        </tr>
                    </thead>
                    <tbody class="inter text-center">
                        @foreach ($requestMitras as $index => $requestMitra)
                            <tr>
                                <td class="border border-dashed border-gray-700 px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border border-dashed border-gray-700 px-4 py-2">{{ $requestMitra->nama_usaha }}</td>
                                <td class="border border-dashed border-gray-700 px-4 py-2">{{ $requestMitra->jenis_usaha }}</td>
                                <td class="border border-dashed border-gray-700 px-4 py-2">{{ $requestMitra->nama_pemilik }}</td>
                                <td class="border border-dashed border-gray-700 px-4 py-2">{{ $requestMitra->status_request }}</td>
                                <td class="border border-dashed border-gray-700 px-4 py-2">
                                    <div class="flex gap-2 justify-center">
                                        @if ($requestMitra->status_request !== 'Diterima')
                                            <form method="POST" action="{{ route('admin.request_mitra.accept', $requestMitra->id) }}"
                                                class="bg-gray-700 text-white px-3 flex inter items-center rounded-full"
                                                onsubmit="return confirm('Apakah anda yakin untuk menerima permintaan kerjasama?')">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit">Terima</button>
                                            </form>
                                        @endif
    
                                        @if ($requestMitra->status_request !== 'Ditolak')
                                            <form method="POST" action="{{ route('admin.request_mitra.reject', $requestMitra->id) }}"
                                                class="bg-gray-700 text-white px-3 flex inter items-center rounded-full"
                                                onsubmit="return confirm('Apakah anda yakin untuk menolak permintaan kerjasama?')">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit">Tolak</button>
                                            </form>
                                        @endif
                                        <a href="{{ route('admin.request_mitra.show', $requestMitra->id) }}"
                                            class="border border-dashed border-gray-700
                                                px-3 flex inline-block inter items-center rounded-full">Lihat</a>
                                        <a href="#"
                                            class="border border-dashed border-gray-700
                                                px-3 flex inline-block inter items-center rounded-full">Edit</a>
                                        <form method="POST" action="#">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    
                <!-- Footer -->
                <div class="border border-dashed border-gray-700
                    w-full px-4 py-2 rounded-b-lg">
                    {{ $requestMitras->links() }}
                </div>
            </div>

        </x-container.main>



    </x-container.admin-page>

</x-layout>