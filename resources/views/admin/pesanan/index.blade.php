<x-layout>
    <div class="border border-dashed border-gray-700">
        <!-- Header -->
        <div class="border border-dashed border-gray-700
            px-4 py-1 flex items-center justify-between">
            <x-table.title :title="'Pesanan'" :link="url('/dashboard')" />

            <div class="flex items-center gap-3">
                <x-table.filter name="status_request" label="Filter status:"
                    :options="['Tersedia', 'Eksklusif']"
                />

                <x-table.search name="search_request" />
            </div>
        </div>

        <table class="">
            <x-table.thead>
                <tr>
                    <x-table.td>No.</x-table.td>
                    <x-table.td>Username</x-table.td>
                    <x-table.td>Nama pengantin</x-table.td>
                    <x-table.td>Tanggal acara</x-table.td>
                    <x-table.td>Tanggal diskusi</x-table.td>
                    <x-table.td>Status pesanan</x-table.td>
                    <x-table.td>Status paket</x-table.td>
                    <x-table.td>Aksi</x-table.td>
                </tr>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($pesanans as $index => $pesanan)
                    <tr>
                        <x-table.td>{{ $index + 1 }}</x-table.td>
                        <x-table.td>{{ $pesanan->user->name }}</x-table.td>
                        <x-table.td>{{ $pesanan->pengantin_pria }} & {{ $pesanan->pengantin_wanita }}</x-table.td>
                        <x-table.td>{{ $pesanan->tanggal_acara->format('d M Y') }}</x-table.td>
                        <x-table.td>{{ $pesanan->tanggal_diskusi->format('d M Y') }}</x-table.td>
                        <x-table.td>{{ $pesanan->status_pesanan }}</x-table.td>
                        <x-table.td>{{ $pesanan->paketPernikahan->status_paket ?? '-' }}</x-table.td>
                        <x-table.td>
                            <div class="flex gap-2 justify-center">
                                <form method="POST" action="{{ route('admin.pesanan.accept', $pesanan->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="bg-gray-700 text-white
                                            px-3 py-1 inter rounded-md">
                                        Konfirmasi
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.pesanan.reject', $pesanan->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="bg-gray-700 text-white
                                            px-3 py-1 inter rounded-md">
                                        Tolak
                                    </button>
                                </form>
                                <a href="{{ route('admin.paket_pernikahan.create', ['pesanan_id' => $pesanan->id]) }}" class=" hidden btn btn-sm btn-primary">
                                    Buatkan Paket  Eksklusif
                                </a>
                            </div>
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </table>

        <x-table.footer>
            {{ $pesanans->links() }}
        </x-table.footer>

    </div>
</x-layout>