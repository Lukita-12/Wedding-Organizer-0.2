<x-layout-dashboard>
    <x-slot:heading>
        Permintaan Kerjasama
    </x-slot:heading>

    <div class="flex flex-col gap-3">
        <div class="flex justify-end gap-3">
            <x-table.link variant="create" href="{{ route('admin.request_mitra.create') }}">+ Tambah</x-table.link>
            <x-table.link variant="print" href="{{ route('request_mitra.print', ['page' => $requestMitras->currentPage()]) }}" target="_blank">Cetak PDF</x-table.link>
        </div>

        <x-table.container variant="main">
            <x-table.container variant="heading">
                <x-table.search action="{{ route('admin.request_mitra.search') }}" placeholder="Cari usaha..." />
                
                <div class="flex items-center gap-3">
                    <form method="GET" action="{{ route('admin.request_mitra.filter') }}">
                        @csrf
                        <div class="flex items-center gap-1">
                            <label for="filter_status" class="poppins-medium text-slate-700 text-lg">Filter status:</label>
                            <select name="status_request" id="status_request" onchange="this.form.submit()" class="poppins text-teal-500 text-lg outline-none transition delay-50 hover:ring-2 hover:ring-teal-500">
                                <option value="">All</option>
                                <option value="Diterima" {{ request('status_request') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="Ditolak" {{ request('status_request') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                    </form>
                </div>
            </x-table.container>
    
            <x-table.container variant="table">
                <table>
                    <thead>
                        <tr>
                            <x-table.td variant="head" class="px-4!">No.</x-table.td>
                            <x-table.td variant="head">Nama Pelanggan</x-table.td>
                            <x-table.td variant="head">Nama Usaha</x-table.td>
                            <x-table.td variant="head">Jenis Usaha</x-table.td>
                            <x-table.td variant="head">Nama Pemilik</x-table.td>
                            <x-table.td variant="head">Status Permintaan</x-table.td>
                            <x-table.td variant="head">Aksi</x-table.td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requestMitras as $requestMitra)
                            <x-table.tr variant="body" class="row-click cursor-pointer" data-url="{{ route('admin.request_mitra.show', $requestMitra) }}">
                                <x-table.td class="px-4!">{{ $loop->iteration}}</x-table.td>
                                <x-table.td>{{ $requestMitra->pelanggan->nama_pelanggan ?? '-'}}</x-table.td>
                                <x-table.td>{{ $requestMitra->nama_usaha}}</x-table.td>
                                <x-table.td>{{ $requestMitra->jenis_usaha}}</x-table.td>
                                <x-table.td>{{ $requestMitra->nama_pemilik}}</x-table.td>
                                <x-table.td>{{ $requestMitra->status_request}}</x-table.td>
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
    
                                        <x-table.link variant="edit" href="{{ route('admin.request_mitra.edit', $requestMitra) }}">Edit</x-table.link>
    
                                        <form method="POST" action="{{ route('admin.request_mitra.destroy', $requestMitra) }}">
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
                {{ $requestMitras->withQueryString()->links() }}
            </x-table.container>
            
        </x-table.container>
    </div>

</x-layout-dashboard>