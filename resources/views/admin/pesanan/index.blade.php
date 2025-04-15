<x-layout>
    <x-container.admin-page>

        <x-sidebar.sidebar />
        <x-container.main>
            
            <x-header.header />
            
            <div class="border-sketch rounded-lg">

                <x-header.container>
                    <div class="flex items-center gap-3">
                        <x-header.span-dot />
                        <x-header.h1>PESANAN</x-header.h1>
                        <x-header.button-link href="#">+ Baru</x-header.button-link>
                    </div>
                    <div class="flex items-center gap-3">
                        <x-header.search />
                    </div>
                </x-header.container>

                <x-table.table>
                    <x-table.thead>
                        <x-table.tr>
                            <x-table.td>No.</x-table.td>
                            <x-table.td>Tanggal Pesanan</x-table.td>
                            <x-table.td>Tanggal Diskusi</x-table.td>
                            <x-table.td>Tanggal Acara</x-table.td>
                            <x-table.td>Status Pesanan</x-table.td>
                            <x-table.td>Aksi</x-table.td>
                        </x-table.tr>
                    </x-table.thead>
                    <x-table.tbody>
                        @foreach ($pesanans as $index => $pesanan)
                            <x-table.tr>
                                <x-table.td>{{ $index + 1 }}</x-table.td>
                                <x-table.td>{{ $pesanan->tgl_pesanan->format('d M Y') }}</x-table.td>
                                <x-table.td>{{ $pesanan->tanggal_diskusi->format('d M Y') }}</x-table.td>
                                <x-table.td>{{ $pesanan->tanggal_acara->format('d M Y') }}</x-table.td>
                                <x-table.td>{{ $pesanan->status_pesanan }}</x-table.td>
                                <x-table.td class="flex justify-center items-center gap-2">
                                    <form method="POST" action="#">
                                        @csrf
                                        @method('PUT')
                                        <x-table.button>Konfirmasi</x-table.button>
                                    </form>
                                    <form method="POST" action="#">
                                        @csrf
                                        @method('PUT')
                                        <x-table.button>Tolak</x-table.button>
                                    </form>
                                </x-table.td>
                            </x-table.tr>
                        @endforeach
                    </x-table.tbody>
                </x-table.table>

                <x-container.pagination>
                    {{ $pesanans->links() }}
                </x-container.pagination>

            </div>

        </x-container.main>

    </x-container.admin-page>
</x-layout>