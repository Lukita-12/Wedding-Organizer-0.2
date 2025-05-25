<x-layout-dashboard>
    <x-slot:heading>
        Akun
    </x-slot:heading>

    <x-table.container variant="main">
        <x-table.container variant="heading">
            <x-table.search action="{{ route('admin.akun.search') }}" placeholder="Cari username" />

            <x-table.link variant="create" href="{{ route('admin.akun.create') }}">+ Tambah</x-table.link>
        </x-table.container>

        <x-table.container variant="table">
            <table class="w-full">
                <thead>
                    <tr>
                        <x-table.td variant="head" class="px-4!">No.</x-table.td>
                        <x-table.td variant="head">Username</x-table.td>
                        <x-table.td variant="head">Profile Picture</x-table.td>
                        <x-table.td variant="head">Role</x-table.td>
                        <x-table.td variant="head">Email</x-table.td>
                        <x-table.td variant="head">Password</x-table.td>
                        <x-table.td variant="head">Action</x-table.td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <x-table.tr variant="body">
                            <x-table.td class="px-4!">{{ $loop->iteration }}</x-table.td>
                            <x-table.td>{{ $user->name }}</x-table.td>
                            <x-table.td>
                                <a href="{{ asset('storage/' . $user->profile_pic) }}" target="_blank" class="hover:text-blue-500">
                                    {{ $user->profile_pic ?? '-' }}
                                </a>
                            </x-table.td>
                            <x-table.td>{{ $user->role }}</x-table.td>
                            <x-table.td>{{ $user->email }}</x-table.td>
                            <x-table.td>{{ $user->password }}</x-table.td>
                            <x-table.td>
                                <x-table.container variant="button">
                                    <x-table.link variant="edit" href="{{ route('admin.akun.edit', $user) }}">Edit</x-table.link>
                                    <form method="POST" action="{{ route('admin.akun.destroy', $user) }}">
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
            <span>{{ $users->withQueryString()->links() }}</span>
        </x-table.container>
    </x-table.container>
</x-layout-dashboard>