<x-layout>

    <x-container.admin-page>
        <x-sidebar.sidebar />
        <x-container.main>
            <x-header.header />
            <div class="border-sketch rounded-lg">

                <x-header.container>
                    <div class="flex items-center gap-3">
                        <x-header.span-dot />
                        <x-header.h1>PAKET PERNIKAHAN</x-header.h1>
                        <x-header.button-link href="{{ route('admin.paket_pernikahan.create') }}">+ Baru</x-header.button-link>
                    </div>
                    <div class="flex items-center gap-3">
                        <x-header.search />
                    </div>
                </x-header.container>
                
                <x-table.table>
                    <x-table.thead>
                        <x-table.tr>
                            <x-table.td>No.1</x-table.td>
                            <x-table.td>Nama Paket</x-table.td>
                            <x-table.td>Venue</x-table.td>
                            <x-table.td>Dekorasi</x-table.td>
                            <x-table.td>Tata Rias</x-table.td>
                            <x-table.td>Catering</x-table.td>
                            <x-table.td>Kue Pernikahan</x-table.td>
                            <x-table.td>Fotografer</x-table.td>
                            <x-table.td>Entertainment</x-table.td>
                            <x-table.td>Staff Acara</x-table.td>
                            <x-table.td>Harga DP</x-table.td>
                            <x-table.td>Harga Lunas</x-table.td>
                            <x-table.td>Status Paket</x-table.td>
                            <x-table.td>Aksi</x-ttable.d>
                        </x-table.tr>
                    </x-table.thead>
                    <x-table.tbody>
                        @foreach ($paketPernikahans as $index => $paketPernikahan)
                            <x-table.tr>
                                <x-table.td>{{ $index + 1 }}</x-table.td>
                                <x-table.td>{{ $paketPernikahan->nama_paket }}</x-table.td>

                                <x-table.td>{{ $paketPernikahan->venueUsaha->nama_usaha ?? '-' }}</x-table.td>
                                <x-table.td>{{ $paketPernikahan->dekorasiUsaha->nama_usaha ?? '-' }}</x-table.td>
                                <x-table.td>{{ $paketPernikahan->tataRiasUsaha->nama_usaha ?? '-' }}</x-table.td>
                                <x-table.td>{{ $paketPernikahan->cateringUsaha->nama_usaha ?? '-' }}</x-table.td>
                                <x-table.td>{{ $paketPernikahan->kuePernikahUsaha->nama_usaha ?? '-' }}</x-table.td>
                                <x-table.td>{{ $paketPernikahan->fotograferUsaha->nama_usaha ?? '-' }}</x-table.td>
                                <x-table.td>{{ $paketPernikahan->entertainmentUsaha->nama_usaha ?? '-' }}</x-table.td>
                                
                                <x-table.td>{{ $paketPernikahan->staff_acara }}</x-table.td>
                                <x-table.td>Rp {{ number_format($paketPernikahan->hargaDP_paket, 0, ',', '.') }}</x-table.td>
                                <x-table.td>Rp {{ number_format($paketPernikahan->hargaLunas_paket, 0, ',', '.') }}</x-table.td>
                                <x-table.td>{{ $paketPernikahan->status_paket }}</x-table.td>

                                <x-table.td>
                                    <x-table.button-link href="{{ route('admin.paket_pernikahan.show', $paketPernikahan->id) }}">Lihat</x-table.button-link>
                                </x-table.td>
                            </x-table.tr>
                        @endforeach
                    </x-table.tbody>
                </x-table.table>

                <x-container.pagination>
                    {{ $paketPernikahans->links() }}
                </x-container.pagination>

            </div>
        </x-container.main>
    </x-container.admin-page>

</x-layout>