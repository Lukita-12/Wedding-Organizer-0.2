<x-layout-dashboard>
    <x-slot:heading>
        Pembayaran
    </x-slot:heading>

    <div class="flex flex-col gap-3">
        <div class="flex justify-end gap-3">
            <x-table.link variant="create" href="{{ route('admin.pembayaran.create') }}">+ Tambah</x-table.link>
            <x-table.link variant="print" href="{{ route('pembayaran.print', ['page' => $pembayarans->currentPage()]) }}" target="_blank">Cetak PDF</x-table.link>
        </div>

        <x-table.container variant="main">
            <x-table.container variant="heading">
                <x-table.search action="{{ route('admin.pembayaran.search') }}" placeholder="Cari..." />
            </x-table.container>
    
            <x-table.container variant="table">
                <table>
                    <thead>
                        <tr>
                            <x-table.td variant="head" class="px-4!">No.</x-table.td>
                            <x-table.td variant="head">Nama Pelanggan</x-table.td>
                            <x-table.td variant="head">Nama Paket Pernikahan</x-table.td>
                            <x-table.td variant="head">Tanggal Pemesanan</x-table.td>
                            <x-table.td variant="head">Tanggal Pembayaran</x-table.td>
                            <x-table.td variant="head">Bukti Pembayaran DP</x-table.td>
                            <x-table.td variant="head">Bukti Pembayaran Lunas</x-table.td>
                            <x-table.td variant="head">Status Pembayaran DP</x-table.td>
                            <x-table.td variant="head">Status Pembayaran Lunas</x-table.td>
                            <x-table.td variant="head">Action</x-table.td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayarans as $pembayaran)
                            <x-table.tr variant="body">
                                <x-table.td class="px-4!">{{ $loop->iteration }}</x-table.td>
                                <x-table.td>{{ $pembayaran->pesanan->pelanggan->nama_pelanggan }}</x-table.td>
                                <x-table.td>{{ $pembayaran->pesanan->paketPernikahan->nama_paket ?? '-' }}</x-table.td>
                                <x-table.td>{{ $pembayaran->pesanan->tgl_pesanan->format('d M Y') }}</x-table.td>
                                <x-table.td>{{ optional($pembayaran->tgl_pembayaran)->format('d M Y') ?? '-' }}</x-table.td>
                                <x-table.td>
                                    <a href="{{ asset('storage/' . $pembayaran->bukti_pembayaran_dp) }}" target="_blank" class="text-teal-500 underline hover:text-teal-700">
                                        {{ $pembayaran->bukti_pembayaran_dp ?? '-' }}</x-table.td>
                                    </a>
                                <x-table.td>
                                    <a href="{{ asset('storage/' . $pembayaran->bukti_pembayaran_lunas) }}" target="_blank" class="text-teal-500 underline hover:text-teal-700">
                                        {{ $pembayaran->bukti_pembayaran_lunas ?? '-' }}</x-table.td>
                                    </a>
                                <x-table.td>{{ $pembayaran->bayar_dp }}</x-table.td>
                                <x-table.td>{{ $pembayaran->bayar_lunas }}</x-table.td>
                                <x-table.td>
                                    <x-table.container variant="button">
                                        <a href="{{ route('invoice.preview', $pembayaran->id) }}" target="_blank" class="inline-block bg-teal-500 poppins text-slate-100 text-sm px-3 py-1">
                                            Invoice
                                        </a>
                                        <x-table.link variant="edit" href="{{ route('admin.pembayaran.edit', $pembayaran) }}">Edit</x-table.link>
                                        <form method="POST" action="{{ route('admin.pembayaran.destroy', $pembayaran) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-table.button variant="delete" type="submit">Hapus</x-table.button>
                                        </form>
                                    </x-table.container>
                                </x-table.td>
                            </x-table.tr>
                        @endforeach
                    </tbody>
                </table>
            </x-table.container>
    
            <x-table.container variant="footing">
                <span>{{ $pembayarans->withQueryString()->links() }}</span>
            </x-table.container>
        </x-table.container>
    </div>

</x-layout-dashboard>