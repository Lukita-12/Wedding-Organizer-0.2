<x-layout-dashboard>
    <x-slot:heading>
        Permintaan Kerjasama
    </x-slot:heading>

    <x-table.container variant="main">
        <x-table.container variant="heading">
            <x-table.search action="{{ route('admin.request_mitra.search') }}" />
            
            <x-table.link variant="create" href="#">+ Tambah</x-table.link>
        </x-table.container>

        <x-table.container variant="table">
            <table>
                <thead>
                    <tr>
                        <x-table.td variant="heading" class="px-4!">No.</x-table.td>
                        <x-table.td variant="heading">Nama Pelanggan</x-table.td>
                        <x-table.td variant="heading">Nama Usaha</x-table.td>
                        <x-table.td variant="heading">Jenis Usaha</x-table.td>
                        <x-table.td variant="heading">Nama Pemilik</x-table.td>
                        <x-table.td variant="heading">Status Permintaan</x-table.td>
                        <x-table.td variant="heading">Aksi</x-table.td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requestMitras as $requestMitra)
                        <x-table.tr variant="body" class="row-click cursor-pointer" data-url="{{ route('admin.request_mitra.show', $requestMitra) }}">
                            <x-table.td class="px-4!">{{ $loop->iteration }}</x-table.td>
                            <x-table.td>{{ $requestMitra->pelanggan->nama_pelanggan }}</x-table.td>
                            <x-table.td>{{ $requestMitra->nama_usaha }}</x-table.td>
                            <x-table.td>{{ $requestMitra->jenis_usaha }}</x-table.td>
                            <x-table.td>{{ $requestMitra->nama_pemilik }}</x-table.td>
                            <x-table.td>{{ $requestMitra->status_request }}</x-table.td>
                            <x-table.td>
                                <x-table.container variant="button">
                                    <form method="POST" action="{{ route('admin.request_mitra.accept', $requestMitra->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <x-table.button variant="accept" type="submit">Terima</x-table.button>
                                    </form>
                                    
                                    <form method="POST" action="{{ route('admin.request_mitra.reject', $requestMitra->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <x-table.button variant="reject" type="submit">Tolak</x-table.button>
                                    </form>

                                    <x-table.link variant="edit" href="#">Edit</x-table.link>
                                </x-table.container>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </tbody>
            </table>
        </x-table.container>

        <x-table.container variant="footing">
            {{ $requestMitras->links() }}
        </x-table.container>
        
    </x-table.container>

</x-layout-dashboard>