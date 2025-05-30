<x-layout-dashboard>
    <x-slot:heading>
        Paket Pernikahan
    </x-slot:heading>

    <div class="flex flex-col gap-3">
        <div class="flex justify-end gap-3">
            <x-table.link variant="create" href="{{ route('admin.paket_pernikahan.create') }}">+ Tambah</x-table.link>
            <x-table.link variant="print" href="{{ route('laporan.paket_pernikahan.print', ['page' => $paketPernikahans->currentPage()]) }}" target="_blank">Cetak PDF</x-table.link>
        </div>

        <x-table.container variant="main">
            <x-table.container  variant="heading">
                <x-table.search action="{{ route('admin.paket_pernikahan.search') }}" placeholder="Cari nama paket..." />
    
                <x-table.container variant="filter">
                    <x-table.filter action="{{ route('admin.paket_pernikahan.filter') }}" name="status_paket" id="status_paket">
                        <option value="">All</option>
                        <option value="Tersedia" {{ request('status_paket') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="Eksklusif" {{ request('status_paket') == 'Eksklusif' ? 'selected' : '' }}>Eksklusif</option>
                        <option value="Tidak tersedia" {{ request('status_paket') == 'Tidak tersedia' ? 'selected' : '' }}>Tidak tersedia</option>
                    </x-table.filter>
                </x-table.container>
            </x-table.container>
    
            <x-table.container variant="table">
                <table>
                    <thead>
                        <tr>
                            <x-table.td variant="head" class="px-4!">No.</x-table.td>
                            <x-table.td variant="head">Nama Paket</x-table.td>
                            <x-table.td variant="head">Eksklusif User</x-table.td>
    
                            <x-table.td variant="head">Venue</x-table.td>
                            <x-table.td variant="head">Dekorasi</x-table.td>
                            <x-table.td variant="head">Tata Rias</x-table.td>
                            <x-table.td variant="head">Catering</x-table.td>
                            <x-table.td variant="head">Kue Pernikahan</x-table.td>
                            <x-table.td variant="head">Fotografer</x-table.td>
                            <x-table.td variant="head">Entertainment</x-table.td>
                            <x-table.td variant="head">Staff Acara</x-table.td>
    
                            <x-table.td variant="head">Harga DP</x-table.td>
                            <x-table.td variant="head">Harga Lunas</x-table.td>
                            <x-table.td variant="head">Status Paket</x-table.td>
                            <x-table.td variant="head">Aksi</x-table.td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paketPernikahans as $paketPernikahan)
                            <x-table.tr variant="body" class="row-click cursor-pointer" data-url="#">
                                <x-table.td class="px-4!">{{ $loop->iteration }}</x-table.td>
                                <x-table.td>{{ $paketPernikahan->nama_paket }}</x-table.td>
                                <x-table.td>
                                    {{ $paketPernikahan->user->name ?? '-' }}, <span class="text-teal-500">{{ $paketPernikahan->user->email ?? '-'}}</span>
                                </x-table.td>
    
                                <x-table.td>{{ $paketPernikahan->venueUsaha         ->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                                <x-table.td>{{ $paketPernikahan->dekorasiUsaha      ->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                                <x-table.td>{{ $paketPernikahan->tataRiasUsaha      ->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                                <x-table.td>{{ $paketPernikahan->cateringUsaha      ->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                                <x-table.td>{{ $paketPernikahan->kuePernikahanUsaha ->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                                <x-table.td>{{ $paketPernikahan->fotograferUsaha    ->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                                <x-table.td>{{ $paketPernikahan->entertainmentUsaha ->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                                
                                <x-table.td>{{ $paketPernikahan->staff_acara ?? '-' }}</x-table.td>
                                <x-table.td>Rp. {{ number_format($paketPernikahan->hargaDP_paket, 0, ',', '.') }}</x-table.td>
                                <x-table.td>Rp. {{ number_format($paketPernikahan->hargaLunas_paket, 0, ',', '.') }}</x-table.td>
                                <x-table.td>{{ $paketPernikahan->status_paket }}</x-table.td>
                                <x-table.td>
                                    <x-table.container variant="button">
                                        <x-table.link variant="edit" href="{{ route('admin.paket_pernikahan.edit', $paketPernikahan) }}">Edit</x-table.link>
                                        <form method="POST" action="{{ route('admin.paket_pernikahan.destroy', $paketPernikahan) }}">
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
                {{ $paketPernikahans->withQueryString()->links() }}
            </x-table.container>
        </x-table.container>
    </div>
</x-layout-dashboard>