<x-layout-dashboard>
    <x-slot:heading>
        Pelanggan
    </x-slot:heading>

    <x-table.container variant="main">
        <x-table.container variant="heading">
            <x-table.search action="{{ route('admin.pelanggan.search') }}" placeholder="Cari pelanggan..." />

            <x-table.link variant="create" href="{{ route('admin.pelanggan.create') }}">+ Tambah</x-table.link>
        </x-table.container>

        <x-table.container variant="table">
            <table>
                <thead>
                    <tr>
                        <x-table.td variant="head" class="px-4!">No.</x-table.td>
                        <x-table.td variant="head">Nama Pelanggan</x-table.td>
                        <x-table.td variant="head">Jenis Kelamin</x-table.td>
                        <x-table.td variant="head">No. Telp</x-table.td>
                        <x-table.td variant="head">Email</x-table.td>
                        <x-table.td variant="head">Alamat</x-table.td>
                        <x-table.td variant="head">Aksi</x-table.td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggans as $pelanggan)
                        <x-table.tr variant="body">
                            <x-table.td class="px-4!">{{ $loop->iteration }}</x-table.td>
                            <x-table.td>{{ $pelanggan->nama_pelanggan }}</x-table.td>
                            <x-table.td>{{ $pelanggan->jk_pelanggan }}</x-table.td>
                            <x-table.td>{{ $pelanggan->noTelp_pelanggan }}</x-table.td>
                            <x-table.td>{{ $pelanggan->email_pelanggan }}</x-table.td>
                            <x-table.td>{{ $pelanggan->alamat_pelanggan }}</x-table.td>
                            <x-table.td>
                                <x-table.container variant="button">
                                    <x-table.link variant="edit" href="{{ route('admin.pelanggan.edit', $pelanggan) }}">Edit</x-table.link>
                                    
                                    <form method="POST" action="{{ route('admin.pelanggan.destroy', $pelanggan) }}">
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
            {{ $pelanggans->appends(['search' => request('search')])->links() }}
        </x-table.container>
    </x-table.container>
</x-layout-dashboard>