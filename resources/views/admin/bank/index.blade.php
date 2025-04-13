<x-layout>

    <div>
        <!-- Header -->
        <div class="border border-dashed border-gray-700
            px-4 py-1 flex items-center justify-between">
            <x-table.title :title="'Bank'" :link="route('admin.bank.create')" />

            <div class="flex items-center gap-3">
                <x-table.filter name="status_request" label="Filter status:" :options="['Tersedia', 'Eksklusif']"/>
                <x-table.search name="search_request" />
            </div>
        </div>

        <table>
            <xtable.thead>
                <tr>
                    <x-table.td class="border px-4 py-2">No.</x-table.td>
                    <x-table.td class="border px-4 py-2">Nama bank</x-table.td>
                    <x-table.td class="border px-4 py-2">Nomor rekening</x-table.td>
                    <x-table.td class="border px-4 py-2">Aksi</x-table.td>
                </tr>
            </xtable.thead>
            <xtable.tbody>
                @foreach ($banks as $index => $bank)
                    <tr>
                        <x-table.td class="border px-4 py-2">{{ $index + 1 }}</x-table.td>
                        <x-table.td class="border px-4 py-2">{{ $bank->nama_bank }}</x-table.td>
                        <x-table.td class="border px-4 py-2">{{ $bank->no_rekening }}</x-table.td>
                        <x-table.td class="border px-4 py-2">
                            <a href="{{ route('admin.bank.edit', $bank->id) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.bank.destroy', $bank->id) }}"
                                onsubmit="return confirm('Apakah anda yakin untuk menghapus data?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    Hapus
                                </button>
                            </form>
                        </x-table.td>
                    </tr>
                @endforeach
            </xtable.tbody>
        </table>

        <div>
            {{ $banks->links() }}
        </div>
    </div>

</x-layout>