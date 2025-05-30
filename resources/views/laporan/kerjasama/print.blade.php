<x-layout-report>
    <x-slot:laporan>
        LAPORAN KERJASAMA
    </x-slot:laporan>

    <table>
        <thead>
            <tr>
                <x-table.td variant="head-report">No.</x-table.td>
                <x-table.td variant="head-report">Nama Usaha</x-table.td>
                <x-table.td variant="head-report">Nama Pemilik</x-table.td>
                <x-table.td variant="head-report">Jenis Usaha</x-table.td>

                <x-table.td variant="head-report">No. Telpon</x-table.td>
                <x-table.td variant="head-report">Email</x-table.td>
                <x-table.td variant="head-report">Alamat</x-table.td>
                <x-table.td variant="head-report">Harga 01</x-table.td>
                <x-table.td variant="head-report">Keterangan Harga 01</x-table.td>
                <x-table.td variant="head-report">Harga 02</x-table.td>
                <x-table.td variant="head-report">Keterangan Harga 02</x-table.td>
            </tr>
        </thead>
        <tbody>
            @foreach ($kerjasamas as $kerjasama)
                <tr>
                    <x-table.td variant="body-report">{{ $loop->iteration }}</x-table.td>
                    <x-table.td variant="body-report">{{ $kerjasama->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $kerjasama->requestMitra->nama_pemilik ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $kerjasama->requestMitra->jenis_usaha ?? '-' }}</x-table.td>

                    <x-table.td variant="body-report">{{ $kerjasama->noTelp_usaha ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report" class="whitespace-normal break-all">{{ $kerjasama->email_usaha ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report" class="whitespace-normal break-all">{{ $kerjasama->alamat_usaha ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">Rp. {{ number_format($kerjasama->harga01, 0, ',', '.') }}</x-table.td>
                    <x-table.td variant="body-report" class="whitespace-normal break-all">{{ $kerjasama->ket_harga01 ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">Rp. {{ number_format($kerjasama->harga02, 0, ',', '.') }}</x-table.td>
                    <x-table.td variant="body-report" class="whitespace-normal break-all">{{ $kerjasama->ket_harga02 ?? '-' }}</x-table.td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout-report>