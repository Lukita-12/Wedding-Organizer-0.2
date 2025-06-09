<x-layout-report>
    <x-slot:heading>
        PERMINTAAN KERJASAMA
    </x-slot:heading>

    <table>
        <thead>
            <x-table.tr variant="head-report">
                <x-table.td variant="head-report">No.</x-table.td>
                <x-table.td variant="head-report">Nama Pelanggan</x-table.td>
                <x-table.td variant="head-report">No. Telp/WA</x-table.td>

                <x-table.td variant="head-report">Nama Pemilik</x-table.td>
                <x-table.td variant="head-report">Nama Usaha</x-table.td>
                <x-table.td variant="head-report">Jenis Usaha</x-table.td>
                <x-table.td variant="head-report">Status Permintaan</x-table.td>
            </x-table.tr>
        </thead>
        <tbody>
            @foreach ($requestMitras as $requestMitra)
                <x-table.tr variant="body-report">
                    <x-table.td variant="body-report">{{ $loop->iteration }}</x-table.td>
                    <x-table.td variant="body-report">{{ $requestMitra->pelanggan->nama_pelanggan }}</x-table.td>
                    <x-table.td variant="body-report">{{ $requestMitra->pelanggan->noTelp_pelanggan }}</x-table.td>

                    <x-table.td variant="body-report">{{ $requestMitra->nama_pemilik }}</x-table.td>
                    <x-table.td variant="body-report">{{ $requestMitra->nama_usaha }}</x-table.td>
                    <x-table.td variant="body-report">{{ $requestMitra->jenis_usaha }}</x-table.td>
                    <x-table.td variant="body-report">{{ $requestMitra->status_request }}</x-table.td>
                </x-table.tr>
            @endforeach
        </tbody>
    </table>
</x-layout-report>