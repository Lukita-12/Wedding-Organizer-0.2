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
            <div class="border-sketch rounded-lg">

                <x-header.container>
                    <div class="flex gap-3 items-center">
                        <x-header.span-dot />
                        <x-header.h1>PERMINTAAN KERJASAMA</x-header.h1>
                        <x-header.button-link href="#">+ Baru</x-header.button-link>
                    </div>
                    <div class="flex gap-3 items-center">
                        <x-header.search />
                    </div>
                </x-header.container>

                <x-table.table>
                    @php
                        function sortLink($column, $label, $currentSortBy, $currentSortOrder) {
                            $newOrder = ($currentSortBy === $column && $currentSortOrder === 'asc') ? 'desc' : 'asc';
                            $query = array_merge(request()->query(), ['sort_by' => $column, 'sort_order' => $newOrder]);
                            return '<a href="' . route('admin.request_mitra.index', $query) . '" class="underline">' . $label . '</a>';
                        }
                    @endphp
                    <x-table.thead>
                        <tr>
                            <x-table.td>No.</x-table.td>
                            <x-table.td>{!! sortLink('nama_usaha', 'Nama Usaha', $sortBy, $sortOrder) !!}</x-table.td>
                            <x-table.td>{!! sortLink('jenis_usaha', 'Jenis usaha', $sortBy, $sortOrder) !!}</x-table.td>
                            <x-table.td>{!! sortLink('nama_pemilik', 'Nama pemilik', $sortBy, $sortOrder) !!}</x-table.td>
                            <x-table.td>{!! sortLink('status_request', 'Status permintaan', $sortBy, $sortOrder) !!}</x-table.td>
                            <x-table.td>Aksi</x-table.td>
                        </tr>
                    </x-table.thead>
                    <x-table.tbody>
                        @foreach ($requestMitras as $index => $requestMitra)
                            <x-table.tr>
                                <x-table.td>{{ $index + 1 }}</x-table.td>
                                <x-table.td>{{ $requestMitra->nama_usaha }}</x-table.td>
                                <x-table.td>{{ $requestMitra->jenis_usaha }}</x-table.td>
                                <x-table.td>{{ $requestMitra->nama_pemilik }}</x-table.td>
                                <x-table.td>{{ $requestMitra->status_request }}</x-table.td>
                                <x-table.td class="flex justify-center items-center gap-2">
                                    <form method="POST" action="{{ route('admin.request_mitra.accept', $requestMitra->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <x-table.button type="submit">Terima</x-table.button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.request_mitra.reject', $requestMitra->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <x-table.button type="submit">Tolak</x-table.button>
                                    </form>

                                    <x-table.button-link href="{{ route('admin.request_mitra.show', $requestMitra->id) }}">Lihat</x-table.button-link>
                                </x-table.td>
                            </x-table.tr>
                        @endforeach
                    </x-table.tbody>
                </x-table.table>

                <x-container.pagination>
                    {{ $requestMitras->links() }}
                </x-container.pagination>

            </div>

        </x-container.main>

    </x-container.admin-page>

</x-layout>