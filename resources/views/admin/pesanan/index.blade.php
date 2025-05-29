<x-layout-dashboard>
    <x-slot:heading>
        Pesanan
    </x-slot:heading>

    <div class="flex flex-col gap-3">
        <div class="flex justify-end gap-3">
            <x-table.link variant="create" href="{{ route('admin.pesanan.create') }}">+ Tambah</x-table.link>
            <x-table.link variant="print" href="{{ route('laporan.pesanan.print', ['page' => $pesanans->currentPage()]) }}">Cetak PDF</x-table.link>
        </div>
    
        <x-table.container variant="main">
            <x-table.container variant="heading">
                <x-table.search action="{{ route('admin.pesanan.search') }}" placeholder="Cari pelanggan..." />
    
                <x-table.container variant="filter">
                    <x-table.filter action="{{ route('admin.pesanan.filter') }}" name="status_pesanan" id="status_pesanan">
                        <option value="">All</option>
                        <option value="Dalam proses"{{ request('status_pesanan') === 'Dalam proses' ? 'selected' : '' }}>Dalam proses</option>
                        <option value="Diterima"    {{ request('status_pesanan') === 'Diterima'     ? 'selected' : '' }}>Diterima</option>
                        <option value="Dibatalkan"  {{ request('status_pesanan') === 'Dibatalkan'   ? 'selected' : '' }}>Dibatalkan</option>
                        <option value="Selesai"     {{ request('status_pesanan') === 'Selesai'      ? 'selected' : '' }}>Selesai</option>
                    </x-table.filter>
                </x-table.container>
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
                                <x-table.td>
                                    {{ $pesanan->pelanggan->nama_pelanggan }}, <span class="text-teal-500">{{ $pesanan->pelanggan->email_pelanggan }}</span>
                                </x-table.td>
                                <x-table.td>{{ $pesanan->paketPernikahan->nama_paket ?? '-' }}</x-table.td>
            
                                <x-table.td>{{ $pesanan->tgl_pesanan->format('d M Y') }}</x-table.td>
                                <x-table.td>{{ $pesanan->pengantin_pria }}</x-table.td>
                                <x-table.td>{{ $pesanan->pengantin_wanita }}</x-table.td>
                                <x-table.td>{{ $pesanan->tanggal_diskusi->format('d M Y') }}</x-table.td>
                                <x-table.td>{{ $pesanan->tanggal_acara->format('d M Y') }}</x-table.td>
                                <x-table.td>Rp. {{ number_format($pesanan->total_harga_pesanan, 0, ',', '.') }}</x-table.td>
                                <x-table.td>{{ $pesanan->status_pesanan }}</x-table.td>
                                <x-table.td>
                                    <x-table.container variant="button">
                                        <form method="POST" action="{{ route('admin.pesanan.accept', $pesanan) }}">
                                            @csrf
                                            @method('PATCH')
                                            <x-table.button variant="accept" type="submit">Terima</x-table.button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.pesanan.reject', $pesanan) }}">
                                            @csrf
                                            @method('PATCH')
                                            <x-table.button variant="reject" type="submit">Tolak</x-table.button>
                                        </form>
                                        <x-table.link variant="edit" href="{{ route('admin.pesanan.edit', $pesanan) }}">Edit</x-table.link>
                                        <form method="POST" action="{{ route('admin.pesanan.destroy', $pesanan) }}">
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
    </div>

    @if (session('warning'))
        <div class="bg-yellow-200 text-yellow-800 px-4 py-2 rounded mb-3">
            {{ session('warning') }}
        </div>
    @endif
</x-layout-dashboard>