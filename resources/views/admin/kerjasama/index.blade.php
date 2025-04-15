<x-layout>

    <x-container.admin-page>
        <x-sidebar.sidebar />

        <x-container.main>
            
            <x-header.header />

            <div class="border-sketch rounded-lg">
                
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
                                    <x-table.button-link href="{{ route('admin.kerjasama.show', $kerjasama->id) }}">Lihat</x-table.button-link>
                                </x-table.td>
                            </x-table.tr>
                        @endforeach
                    </x-table.tbody>
                </x-table.table>

                <x-container.pagination>
                    {{ $kerjasamas->links() }}
                </x-container.pagination>

            </div>

        </x-container.main>
    </x-container.admin-page>

</x-layout>