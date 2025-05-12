<x-layout-dashboard>
    <x-slot:heading>
        Kerjasama
    </x-slot:heading>

    <x-table.container variant="main">
        <x-table.container variant="heading">
            <x-table.search action="{{ route('admin.kerjasama.search') }}" placeholder="Cari usaha..." />

            <x-table.link variant="create" href="{{ route('admin.kerjasama.create') }}">+ Tambah</x-table.link>
        </x-table.container>
    
        <x-table.container variant="table">
            <table>
                <thead>
                    <tr>
                        <x-table.td variant="head" class="px-4!">No.</x-table.td>
                        <x-table.td variant="head">Nama Usaha</x-table.td>
                        <x-table.td variant="head">Nama Pemilik</x-table.td>
                        <x-table.td variant="head">Jenis Usaha</x-table.td>
                        <x-table.td variant="head">No. Telpon</x-table.td>
                        <x-table.td variant="head">Email</x-table.td>
                        <x-table.td variant="head">Alamat</x-table.td>
                        <x-table.td variant="head">Harga 01</x-table.td>
                        <x-table.td variant="head">Keterangan Harga 01</x-table.td>
                        <x-table.td variant="head">Harga 02</x-table.td>
                        <x-table.td variant="head">Keterangan Harga 02</x-table.td>
                        <x-table.td variant="head">Aksi</x-table.td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kerjasamas as $kerjasama)
                        <x-table.tr variant="body" class="row-click cursor-pointer" data-url="{{ route('admin.kerjasama.show', $kerjasama) }}">
                            <x-table.td class="px-4!">{{ $loop->iteration }}</x-table.td>
                            <x-table.td>{{ $kerjasama->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                            <x-table.td>{{ $kerjasama->requestMitra->nama_pemilik ?? '-' }}</x-table.td>
                            <x-table.td>{{ $kerjasama->requestMitra->jenis_usaha ?? '-' }}</x-table.td>
        
                            <x-table.td>{{ $kerjasama->noTelp_usaha }}</x-table.td>
                            <x-table.td>{{ $kerjasama->email_usaha }}</x-table.td>
                            <x-table.td>{{ $kerjasama->alamat_usaha }}</x-table.td>
                            <x-table.td>Rp. {{ number_format($kerjasama->harga01, 0, ',', '.') }}</x-table.td>
                            <x-table.td>{{ $kerjasama->ket_harga01 }}</x-table.td>
                            <x-table.td>Rp. {{ number_format($kerjasama->harga02, 0, ',', '.') }}</x-table.td>
                            <x-table.td>{{ $kerjasama->ket_harga02 }}</x-table.td>
                            <x-table.td>
                                <x-table.container variant="button">
                                    <x-table.link variant="edit" href="{{ route('admin.kerjasama.edit', $kerjasama) }}">Edit</x-table.link>
                                    <form method="POST" action="{{ route('admin.kerjasama.destroy', $kerjasama) }}">
                                        @csrf
                                        @method('DELETE')
                                        <x-table.button type="submit" variant="delete">Hapus</x-table.button>
                                    </form>
                                </x-table.container>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </tbody>
            </table>
        </x-table.container>
    
        <x-table.container variant="footing">
            {{ $kerjasamas->links() }}
        </x-table.container>
    </x-table.container>
</x-layout-dashboard>