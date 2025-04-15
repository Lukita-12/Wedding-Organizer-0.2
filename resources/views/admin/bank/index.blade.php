<x-layout>

    <x-container.admin-page>

        <x-sidebar.sidebar />
        <x-container.main>
            <x-.header.header />
            <div class="border-skectch rounded-lg">

                <x-header.container>
                    <div class="flex items-center gap-3">
                        <x-header.span-dot />
                        <x-header.h1>BANK</x-header.h1>
                        <x-header.button-link href="{{ route('admin.bank.create') }}">+ Baru</x-header.button-link>
                    </div>
                    <div class="flex items-center gap-3">
                        <x-header.search />
                    </div>
                </x-header.container>

                <x-table.table>
                    <x-table.thead>
                        <x-table.tr>
                            <x-table.td>No.</x-table.td>
                            <x-table.td>Nama Bank</x-table.td>
                            <x-table.td>No. Rekening</x-table.td>
                            <x-table.td>Aksi</x-table.td>
                        </x-table.tr>
                    </x-table.thead>
                    <x-table.tbody>
                        @foreach ($banks as $index => $bank)
                            <x-table.tr>
                                <x-table.td>{{ $index + 1 }}</x-table.td>
                                <x-table.td>{{ $bank->nama_bank }}</x-table.td>
                                <x-table.td>{{ $bank->no_rekening }}</x-table.td>
                                <x-table.td>
                                    <x-table.button-link href="{{ route('admin.bank.edit', $bank->id) }}">Edit</x-table.button-link>
                                </x-table.td>
                            </x-table.tr>
                        @endforeach
                    </x-table.tbody>
                </x-table.table>

                <x-container.pagination>
                    {{ $banks->links() }}
                </x-container.pagination>

            </div>
        </x-container.main>

    </x-container.admin-page>

</x-layout>