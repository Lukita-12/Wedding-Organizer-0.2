<x-layout-report>
    <x-slot:heading>
        LAPORAN KERJASAMA
    </x-slot:heading>

    <table>
        <thead>
            <x-table.tr variant="head-report">
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
            </x-table.tr>
        </thead>
        <tbody>
            @foreach ($kerjasamas as $kerjasama)
                <x-table.tr variant="body-report">
                    <x-table.td variant="body-report" class="text-sm">{{ $loop->iteration }}</x-table.td>
                    <x-table.td variant="body-report" class="text-sm">{{ $kerjasama->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report" class="text-sm">{{ $kerjasama->requestMitra->nama_pemilik ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report" class="text-sm">{{ $kerjasama->requestMitra->jenis_usaha ?? '-' }}</x-table.td>

                    <x-table.td variant="body-report" class="text-sm whitespace-nowrap">{{ $kerjasama->noTelp_usaha ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report" class="text-sm">{{ $kerjasama->email_usaha ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report" class="text-sm leading-none">{{ $kerjasama->alamat_usaha ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report" class="text-sm whitespace-nowrap">Rp. {{ number_format($kerjasama->harga01, 0, ',', '.') }}</x-table.td>
                    <x-table.td variant="body-report" class="text-sm">{{ $kerjasama->ket_harga01 ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report" class="text-sm whitespace-nowrap">Rp. {{ number_format($kerjasama->harga02, 0, ',', '.') }}</x-table.td>
                    <x-table.td variant="body-report" class="text-sm">{{ $kerjasama->ket_harga02 ?? '-' }}</x-table.td>
                </x-table.tr>
            @endforeach
        </tbody>
    </table>
</x-layout-report>