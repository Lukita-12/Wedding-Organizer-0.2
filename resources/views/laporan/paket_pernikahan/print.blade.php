<x-layout-report>
    <x-slot:laporan>
        LAPORAN PAKET PERNIKAHAN
    </x-slot:laporan>

    <table>
        <thead>
            <tr>
                <x-table.td variant="head-report">No.</x-table.td>
                <x-table.td variant="head-report">Nama Paket</x-table.td>
                <x-table.td variant="head-report">Eksklusif User</x-table.td>

                <x-table.td variant="head-report">Venue</x-table.td>
                <x-table.td variant="head-report">Dekorasi</x-table.td>
                <x-table.td variant="head-report">Tata Rias</x-table.td>
                <x-table.td variant="head-report">Catering</x-table.td>
                <x-table.td variant="head-report">Kue Pernikahan</x-table.td>
                <x-table.td variant="head-report">Fotografer</x-table.td>
                <x-table.td variant="head-report">Entertainment</x-table.td>
                <x-table.td variant="head-report">Staff Acara</x-table.td>

                <x-table.td variant="head-report">Harga DP</x-table.td>
                <x-table.td variant="head-report">Harga Lunas</x-table.td>
            </tr>
        </thead>
        <tbody>
            @foreach ($paketPernikahans as $paketPernikahan)
                <tr>
                    <x-table.td variant="body-report">{{ $loop->iteration }}</x-table.td>
                    <x-table.td variant="body-report">{{ $paketPernikahan->nama_paket }}</x-table.td>
                    <x-table.td variant="body-report">{{ $paketPernikahan->user->name ?? '-' }}</x-table.td>

                    <x-table.td variant="body-report">{{ $paketPernikahan->venueUsaha         ->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $paketPernikahan->dekorasiUsaha      ->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $paketPernikahan->tataRiasUsaha      ->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $paketPernikahan->cateringUsaha      ->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $paketPernikahan->kuePernikahanUsaha ->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $paketPernikahan->fotograferUsaha    ->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $paketPernikahan->entertainmentUsaha ->requestMitra->nama_usaha ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $paketPernikahan->staff_acara ?? '-' }}</x-table.td>

                    <x-table.td variant="body-report">Rp. {{ number_format($paketPernikahan->hargaDP_paket, 0, ',', '.') }}</x-table.td>
                    <x-table.td variant="body-report">Rp. {{ number_format($paketPernikahan->hargaLunas_paket, 0, ',', '.') }}</x-table.td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout-report>