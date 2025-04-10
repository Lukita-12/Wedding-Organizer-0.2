<x-layout>
    <div>
        
        <h1 class="mb-4">Pesanan</h1>

        <table>
            <thead>
                <td class="border px-4 py-2">No.</th>
                <td class="border px-4 py-2">Username</td>
                <td class="border px-4 py-2">Nama pengantin</td>
                <td class="border px-4 py-2">Tanggal acara</td>
                <td class="border px-4 py-2">Tanggal diskusi</td>
                <td class="border px-4 py-2">Status pesanan</td>
                <td class="border px-4 py-2">Status paket</td>
                <td class="border px-4 py-2">Aksi</td>
            </thead>
            <tbody>
                @foreach ($pesanans as $index => $pesanan)
                    <tr>
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $pesanan->user->name }}</td>
                        <td class="border px-4 py-2">{{ $pesanan->pengantin_pria }} & {{ $pesanan->pengantin_wanita }}</td>
                        <td class="border px-4 py-2">{{ $pesanan->tanggal_acara->format('d M Y') }}</td>
                        <td class="border px-4 py-2">{{ $pesanan->tanggal_diskusi->format('d M Y') }}</td>
                        <td class="border px-4 py-2">{{ $pesanan->status_pesanan }}</td>
                        <td class="border px-4 py-2">{{ $pesanan->paketPernikahan->status_paket ?? '-' }}</td>
                        <td class="border px-4 py-2">
                            <form method="POST" action="{{ route('admin.pesanan.accept', $pesanan->id) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit">Konfirmasi</button>
                            </form>
                            <form method="POST" action="{{ route('admin.pesanan.reject', $pesanan->id) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit">Tolak</button>
                            </form>
                            <a href="{{ route('admin.paket_pernikahan.create', ['pesanan_id' => $pesanan->id]) }}" class="btn btn-sm btn-primary">
                                Buatkan Paket Eksklusif
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-layout>