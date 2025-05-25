<x-layout-dashboard>
    <x-slot:heading>
        Ulasan
    </x-slot:heading>

    <x-table.container variant="main">
        <x-table.container variant="heading">
            <x-table.search action="{{ route('admin.ulasan.search') }}" placeholder="Cari..." />

            <x-table.link variant="create" href="{{ route('admin.ulasan.create') }}">+ Tambah</x-table.link>
        </x-table.container>

        <x-table.container variant="table">
            <table class="w-full">
                <thead>
                    <tr>
                        <x-table.td variant="head" class="px-4!">No.</x-table.td>
                        <x-table.td variant="head">Username</x-table.td>
                        <x-table.td variant="head">Ulasan</x-table.td>
                        <x-table.td variant="head">Action</x-table.td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ulasans as $ulasan)
                        <x-table.tr variant="body">
                            <x-table.td class="px-4!">{{ $loop->iteration }}</x-table.td>
                            <x-table.td>{{ $ulasan->user->name }}</x-table.td>
                            <x-table.td>{{ $ulasan->ulasan }}</x-table.td>
                            <x-table.td>
                                <x-table.container variant="button">
                                    <x-table.link variant="edit" href="{{ route('admin.ulasan.edit', $ulasan) }}">Edit</x-table.link>
                                    <form method="POST" action="{{ route('admin.ulasan.destroy', $ulasan) }}">
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
            <span>{{ $ulasans->withQueryString()->links() }}</span>
        </x-table.container>
    </x-table.container>
</x-layout-dashboard>