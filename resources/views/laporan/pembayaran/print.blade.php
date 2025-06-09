<x-layout-report>
    <x-slot:heading>
        LAPORAN PEMBAYARAN
    </x-slot:heading>

    <table>
        <thead>
            <x-table.tr variant="head-report">
                <x-table.td variant="head-report">No.</x-table.td>
                <x-table.td variant="head-report">Pelanggan</x-table.td>
                <x-table.td variant="head-report">Paket Pernikahan</x-table.td>
                <x-table.td variant="head-report">No. Telpon</x-table.td>
                <x-table.td variant="head-report">Email</x-table.td>

                <x-table.td variant="head-report">Tanggal Pemesanan</x-table.td>
                <x-table.td variant="head-report">Tanggal Pembayaran</x-table.td>
                <x-table.td variant="head-report">DP</x-table.td>
                <x-table.td variant="head-report">Lunas</x-table.td>
            </x-table.tr>
        </thead>
        <tbody>
            @foreach ($pembayarans as $pembayaran)
                <x-table.tr variant="body-report">
                    <x-table.td variant="body-report">{{ $loop->iteration }}</x-table.td>
                    <x-table.td variant="body-report">{{ $pembayaran->pesanan->pelanggan->nama_pelanggan }}</x-table.td>
                    <x-table.td variant="body-report">{{ $pembayaran->pesanan->paketPernikahan->nama_paket ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report" class="whitespace-nowrap">{{ $pembayaran->pesanan->pelanggan->noTelp_pelanggan }}</x-table.td>
                    <x-table.td variant="body-report" class="whitespace-nowrap">{{ $pembayaran->pesanan->pelanggan->email_pelanggan }}</x-table.td>

                    <x-table.td variant="body-report" class="whitespace-nowrap">{{ $pembayaran->pesanan->tgl_pesanan->translatedFormat('d F Y') }}</x-table.td>
                    <x-table.td variant="body-report" class="whitespace-nowrap">{{ optional($pembayaran->tgl_pembayaran)->translatedFormat('d F Y') ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $pembayaran->bayar_dp }}</x-table.td>
                    <x-table.td variant="body-report">{{ $pembayaran->bayar_lunas }}</x-table.td>
                </x-table.tr>
            @endforeach
        </tbody>
    </table>
</x-layout-report>