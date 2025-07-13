<x-layout-report>
    <x-slot:heading>
        PAKET PERNIKAHAN
    </x-slot:heading>

    <table>
        <thead>
            <x-table.tr variant="head-report">
                <x-table.td variant="head-report" class="whitespace-nowrap">No.</x-table.td>
                <x-table.td variant="head-report" class="whitespace-nowrap">Nama Paket</x-table.td>

                <x-table.td variant="head-report" class="whitespace-nowrap">Venue</x-table.td>
                <x-table.td variant="head-report" class="whitespace-nowrap">Dekorasi</x-table.td>
                <x-table.td variant="head-report" class="whitespace-nowrap">Tata Rias</x-table.td>
                <x-table.td variant="head-report" class="whitespace-nowrap">Catering</x-table.td>
                <x-table.td variant="head-report" class="whitespace-nowrap">Kue Pernikahan</x-table.td>
                <x-table.td variant="head-report" class="whitespace-nowrap">Fotografer</x-table.td>
                <x-table.td variant="head-report" class="whitespace-nowrap">Entertainment</x-table.td>
            </x-table.tr>
        </thead>
        <tbody>
            @foreach ($paketPernikahans as $paketPernikahan)
                <x-table.tr variant="body-report">
                    <x-table.td variant="body-report">{{ $loop->iteration }}</x-table.td>
                    <x-table.td variant="body-report">{{ $paketPernikahan->nama_paket }}</x-table.td>
    
                    <x-table.td variant="body-report">{{ $paketPernikahan->ket_venue ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $paketPernikahan->ket_dekorasi ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $paketPernikahan->ket_tata_rias ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $paketPernikahan->ket_catering ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $paketPernikahan->ket_kue_pernikahan ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $paketPernikahan->ket_fotografer ?? '-' }}</x-table.td>
                    <x-table.td variant="body-report">{{ $paketPernikahan->ket_entertainment ?? '-' }}</x-table.td>
                </x-table.tr>
            @endforeach
        </tbody>
    </table>
</x-layout-report>