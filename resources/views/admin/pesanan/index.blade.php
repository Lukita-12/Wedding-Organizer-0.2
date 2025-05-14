<x-layout-dashboard>
    <x-slot:heading>
        Pesanan
    </x-slot:heading>

    <x-table.container variant="main">
        <x-table.container variant="heading">
            <x-table.search action="#" placeholder="Cari..." />
            <x-table.link variant="create" href="#">+ Tambah</x-table.link>
        </x-table.container>
        <x-table.container variant="table">
            <table>
                <thead>
                    <tr>
                        <x-table.td variant="head" class="px-4!">No.</x-table.td>
                        <x-table.td variant="head">Nama Pelanggan</x-table.td>
                        <x-table.td variant="head">Paket Pernikahan</x-table.td>
        
                        <x-table.td variant="head">Tanggal Pesanan</x-table.td>
                        <x-table.td variant="head">Pengantin Pria</x-table.td>
                        <x-table.td variant="head">Pengantin Wanita</x-table.td>
                        <x-table.td variant="head">Tanggal Acara</x-table.td>
                        <x-table.td variant="head">Tanggal Diskusi</x-table.td>
                        <x-table.td variant="head">Total Pesanan</x-table.td>
                        <x-table.td variant="head">Status Pesanan</x-table.td>
                        <x-table.td variant="head">Aksi</x-table.td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanans as $pesanan)
                        <x-table.tr variant="body" class="row-click cursor-pointer" data-url="#">
                            <x-table.td class="px-4!">{{ $loop->iteration }}</x-table.td>
                            <x-table.td>{{ $pesanan->pelanggan->nama_pelanggan }}</x-table.td>
                            <x-table.td>{{ $pesanan->paketPerniakahan->nama_paket ?? '-' }}</x-table.td>
        
                            <x-table.td>{{ $pesanan->tgl_pesanan->format('d M Y') }}</x-table.td>
                            <x-table.td>{{ $pesanan->pengantin_pria }}</x-table.td>
                            <x-table.td>{{ $pesanan->pengantin_wanita }}</x-table.td>
                            <x-table.td>{{ $pesanan->tanggal_diskusi->format('d M Y') }}</x-table.td>
                            <x-table.td>{{ $pesanan->tanggal_acara->format('d M Y') }}</x-table.td>
                            <x-table.td>{{ $pesanan->total_harga_pesanan }}</x-table.td>
                            <x-table.td>{{ $pesanan->status_pesanan }}</x-table.td>
                            <x-table.td>
                                <x-table.container variant="button">
                                    <form method="POST" action="#">
                                        @csrf
                                        @method('PATCH')
                                        <x-table.button variant="accept" type="submit">Terima</x-table.button>
                                    </form>
                                    <form method="POST" action="#">
                                        @csrf
                                        @method('PATCH')
                                        <x-table.button variant="reject" type="submit">Tolak</x-table.button>
                                    </form>
                                    <x-table.link href="#" variant="edit">Edit</x-table.link>
                                    <form method="POST" action="#">
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
            {{ $pesanans->withQueryString()->links() }}
        </x-table.container>
    </x-table.container>
</x-layout-dashboard>