<x-layout-dashboard>
    <x-slot:heading>
        Bank
    </x-slot:heading>

    <x-table.container variant="main">
        <x-table.container variant="heading">
            <x-table.search action="{{ route('admin.bank.search') }}" placeholder="Cari nama bank..." />

            <x-table.link variant="create" href="{{ route('admin.bank.create') }}">+ Tambah</x-table.link>
        </x-table.container>

        <x-table.container variant="table">
            <table class="w-full">
                <thead>
                    <tr>
                        <x-table.td variant="head" class="px-4!">No.</x-table.td>
                        <x-table.td variant="head">Nama Bank</x-table.td>
                        <x-table.td variant="head">Nomor Rekening</x-table.td>
                        <x-table.td variant="head">Action</x-table.td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banks as $bank)
                        <x-table.tr variant="body">
                            <x-table.td class="px-4!">{{ $loop->iteration }}</x-table.td>
                            <x-table.td>{{ $bank->nama_bank }}</x-table.td>
                            <x-table.td>{{ $bank->no_rekening }}</x-table.td>
                            <x-table.td>
                                <x-table.container variant="button">
                                    <x-table.link variant="edit" href="{{ route('admin.bank.edit', $bank) }}">Edit</x-table.link>
                                    <form method="POST" action="{{ route('admin.bank.destroy', $bank) }}">
                                        @csrf
                                        @method('DELETE')
                                        <x-table.button variant="delete" type="submit">Hapus</x-table.button>
                                    </form>
                                </x-table.container>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </tbody>
            </table>
        </x-table.container>

        <x-table.container variant="footing">
            <span>{{ $banks->withQueryString()->links() }}</span>
        </x-table.container>
    </x-table.container>
</x-layout-dashboard>