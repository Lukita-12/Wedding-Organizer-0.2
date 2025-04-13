<x-layout>
    <div>

        <div class="border border-dashed border-gray-700
            px-4 py-1 flex items-center justify-between">
            <x-table.title :title="'Pembayaran'" :link="url('/dashboard')" />

            <div class="flex items-center gap-3">
                <x-table.filter name="status_request" label="Filter status:"
                    :options="['Tersedia', 'Eksklusif']"
                />

                <x-table.search name="search_request" />
            </div>
        </div>
        
        <div>
            <table>
                <x-table.thead>
                    <tr>
                        <x-table.td class="border px-4 py-2">No.</x-table.td>
                        <x-table.td class="border px-4 py-2">Nama paket</x-table.td>
                        <x-table.td class="border px-4 py-2">User</x-table.td>
                        <x-table.td class="border px-4 py-2">Tanggal pembayaran</x-table.td>
                        <x-table.td class="border px-4 py-2">Bukti pembayaran</x-table.td>
                        <x-table.td class="border px-4 py-2">Bayar DP</x-table.td>
                        <x-table.td class="border px-4 py-2">Bayar lunas</x-table.td>
                        <x-table.td class="border px-4 py-2">Total pesanan</x-table.td>
                        <x-table.td class="border px-4 py-2">Aksi</x-table.td>
                    </tr>
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($pembayarans as $index => $pembayaran)
                        <tr>
                            <x-table.td class="border px-4 py-2">{{ $index + 1 }}</x-table.td>
                            <x-table.td class="border px-4 py-2">{{ $pembayaran->pesanan->paketPernikahan->nama_paket }}</x-table.td>
                            <x-table.td class="border px-4 py-2">{{ $pembayaran->pesanan->user->name }}</x-table.td>
                            <x-table.td class="border px-4 py-2">{{ $pembayaran->tgl_pembayaran->format('d-M-Y') }}</x-table.td>
                            <x-table.td class="border px-4 py-2">{{ $pembayaran->bukti_pembayaran }}</x-table.td>
                            <x-table.td class="border px-4 py-2">{{ $pembayaran->bayar_dp }}</x-table.td>
                            <x-table.td class="border px-4 py-2">{{ $pembayaran->bayar_lunas }}</x-table.td>
                            <x-table.td class="border px-4 py-2">{{ $pembayaran->pesanan->total_harga_pesanan }}</x-table.td>
                            <x-table.td class="border px-4 py-2">
                                <a href="#">Edit</a>
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.tbody>
            </table>
        </div>
        <x-table.footer>
            {{ $pembayarans->links() }}
        </x-table.footer>

    </div>
</x-layout>