<x-layout>

    <x-container.admin-page>
        <x-sidebar.sidebar />

        <x-container.main>
            <x-header.header />

            <div class="border-sketch rounded-lg">

                <x-header.container>
                    <div class="flex items-center gap-2">
                        <x-header.span-dot />
                        <x-header.h1>PEMBAYARAN</x-header.h1>
                        <x-header.button-link href="#">+ Baru</x-header.button-link>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-header.search />
                    </div>
                </x-header.container>

                <x-table.table>
                    <x-table.thead>
                        <x-table.tr>
                            <x-table.td>No.</x-table.td>
                            <x-table.td>Paket Penikahan</x-table.td>
                            <x-table.td>Tanggal Pembayaran</x-table.td>
                            <x-table.td>Bukti Pembayaran</x-table.td>
                            <x-table.td>Bayar DP</x-table.td>
                            <x-table.td>Bayar Lunas</x-table.td>
                            <x-table.td>Total pesanan</x-table.td>
                            <x-table.td>Aksi</x-table.td>
                        </x-table.tr>
                    </x-table.thead>
                    <x-table.tbody>
                        @foreach ($pembayarans as $index => $pembayaran)
                            <x-table.tr>
                                <x-table.td>{{ $index + 1 }}</x-table.td>
                                <x-table.td>{{ $pembayaran->pesanan->paketPernikahan->nama_paket }}</x-table.td>
                                <x-table.td>{{ $pembayaran->tgl_pembayaran->format('d M Y') }}</x-table.td>
                                <x-table.td>{{ $pembayaran->bukti_pembayaran }}</x-table.td>
                                <x-table.td>{{ $pembayaran->bayar_dp }}</x-table.td>
                                <x-table.td>{{ $pembayaran->bayar_lunas }}</x-table.td>
                                <x-table.td>Rp. {{ number_format($pembayaran->pesanan->total_harga_pesanan, 0, ',', '.') }}</x-table.td>
                                <x-table.td>
                                    <x-table.button-link href="#">Lihat</x-table.button-link>
                                </x-table.td>
                            </x-table.tr>
                        @endforeach
                    </x-table.tbody>
                </x-table.table>

            </div>

        </x-container.main>
    
    </x-container.admin-page>

</x-layout>