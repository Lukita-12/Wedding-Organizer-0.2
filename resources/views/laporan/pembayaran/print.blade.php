<x-layout-report>
    <x-slot:laporan>
        LAPORAN PEMBAYARAN
    </x-slot:laporan>

    <table class="table-fixed">
        <thead>
            <tr>
                <x-table.td variant="head-report">No.</x-table.td>
                <x-table.td variant="head-report">Pelanggan</x-table.td>
                <x-table.td variant="head-report">Paket Pernikahan</x-table.td>
                <x-table.td variant="head-report">No. Telpon</x-table.td>
                <x-table.td variant="head-report">Email</x-table.td>

                <x-table.td variant="head-report">Tanggal Pemesanan</x-table.td>
                <x-table.td variant="head-report">Tanggal Pembayaran</x-table.td>
                <x-table.td variant="head-report">DP</x-table.td>
                <x-table.td variant="head-report">Lunas</x-table.td>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayarans as $pembayaran)
                <tr>
                    <x-table.td variant="body-report">{{ $loop->iteration }}</x-table.td>
                    <x-table.td variant="body-report">{{ $pembayaran->pesanan->pelanggan->nama_pelanggan }}</x-table.td>
                    <x-table.td variant="body-report">{{ $pembayaran->pesanan->paketPernikahan->nama_paket ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $pembayaran->pesanan->pelanggan->noTelp_pelanggan }}</x-table.td>
                    <x-table.td variant="body-report" class="whitespace-normal break-all">{{ $pembayaran->pesanan->pelanggan->email_pelanggan }}</x-table.td>

                    <x-table.td variant="body-report">{{ $pembayaran->pesanan->tgl_pesanan->format('d m Y') }}</x-table.td>
                    <x-table.td variant="body-report">{{ optional($pembayaran->tgl_pembayaran)->format('d m Y') ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $pembayaran->bayar_dp }}</x-table.td>
                    <x-table.td variant="body-report">{{ $pembayaran->bayar_lunas }}</x-table.td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout-report>