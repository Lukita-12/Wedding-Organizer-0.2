<x-layout>

    <div>
        <!-- Header -->
        <div class="border border-dashed border-gray-700
            px-4 py-1 flex items-center justify-between">
            <x-table.title :title="'Paket Pernikahan'" :link="route('admin.paket_pernikahan.create')" />

            <div class="flex items-center gap-3">
                <x-table.filter name="status_request" label="Filter status:"
                    :options="['Tersedia', 'Eksklusif']"
                />

                <x-table.search name="search_request" />
            </div>
        </div>

        <!-- Table -->
        <div>
            <table>
                <x-table.thead>
                    <tr>
                        <x-table.td class="border px-4 py-2">Nama Paket</x-table.td>
                        <x-table.td class="border px-4 py-2">Venue</x-table.td>
                        <x-table.td class="border px-4 py-2">Dekorasi</x-table.td>
                        <x-table.td class="border px-4 py-2">Tata Rias</x-table.td>
                        <x-table.td class="border px-4 py-2">Catering</x-table.td>
                        <x-table.td class="border px-4 py-2">Kue Pernikahan</x-table.td>
                        <x-table.td class="border px-4 py-2">Fotografer</x-table.td>
                        <x-table.td class="border px-4 py-2">Entertainment</x-table.td>
                        <x-table.td class="border px-4 py-2">Staff Acara</x-table.td>
                        <x-table.td class="border px-4 py-2">Harga DP</x-table.td>
                        <x-table.td class="border px-4 py-2">Harga Lunas</x-table.td>
                        <x-table.td class="border px-4 py-2">Status Paket</x-table.td>
                        <x-table.td class="border px-4 py-2">Aksi</x-table.td>
                    </tr>
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($paketPernikahans as $paketPernikahan)
                        <tr>
                            <x-table.td class="border px-4 py-2">{{ $paketPernikahan->nama_paket }}</x-table.td>

                            <x-table.td class="border px-4 py-2">{{ $paketPernikahan->venueUsaha->nama_usaha ?? '-' }}</x-table.td>
                            <x-table.td class="border px-4 py-2">{{ $paketPernikahan->dekorasiUsaha->nama_usaha ?? '-' }}</x-table.td>
                            <x-table.td class="border px-4 py-2">{{ $paketPernikahan->tataRiasUsaha->nama_usaha ?? '-' }}</x-table.td>
                            <x-table.td class="border px-4 py-2">{{ $paketPernikahan->cateringUsaha->nama_usaha ?? '-' }}</x-table.td>
                            <x-table.td class="border px-4 py-2">{{ $paketPernikahan->kuePernikahUsaha->nama_usaha ?? '-' }}</x-table.td>
                            <x-table.td class="border px-4 py-2">{{ $paketPernikahan->fotograferUsaha->nama_usaha ?? '-' }}</x-table.td>
                            <x-table.td class="border px-4 py-2">{{ $paketPernikahan->entertainmentUsaha->nama_usaha ?? '-' }}</x-table.td>
                            
                            <x-table.td class="border px-4 py-2">{{ $paketPernikahan->staff_acara }}</x-table.td>
                            <x-table.td class="border px-4 py-2">Rp {{ number_format($paketPernikahan->hargaDP_paket, 0, ',', '.') }}</x-table.td>
                            <x-table.td class="border px-4 py-2">Rp {{ number_format($paketPernikahan->hargaLunas_paket, 0, ',', '.') }}</x-table.td>
                            <x-table.td class="border px-4 py-2">{{ $paketPernikahan->status_paket }}</x-table.td>

                            <x-table.td class="border px-4 py-2">
                                <a href="{{ route('admin.paket_pernikahan.show', $paketPernikahan->id) }}">Edit</a>
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.tbody>
            </table>
        </div>

        <!-- Footer -->
        <x-table.footer>
            {{ $paketPernikahans->links() }}
        </x-table.footer>
    </div>

</x-layout>