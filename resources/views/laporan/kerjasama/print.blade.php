<x-layout-report>
    <x-slot:heading>
        LAPORAN KERJASAMA
    </x-slot:heading>

    <table>
        <thead>
            <x-table.tr variant="head-report">
                <x-table.td variant="head-report">No.</x-table.td>

                <x-table.td variant="head-report" class="whitespace-nowrap">Nama Usaha</x-table.td>
                <x-table.td variant="head-report" class="whitespace-nowrap">Nama Pemilik</x-table.td>
                <x-table.td variant="head-report" class="whitespace-nowrap">Jenis Usaha</x-table.td>

                <x-table.td variant="head-report" class="whitespace-nowrap">No. Telpon</x-table.td>
                <x-table.td variant="head-report" class="whitespace-nowrap">Email</x-table.td>
                <x-table.td variant="head-report" class="whitespace-nowrap">Alamat</x-table.td>
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
                </x-table.tr>
            @endforeach
        </tbody>
    </table>
</x-layout-report>