<x-layout>

    <div>
        <div class="flex justify-between">
            <h1>Paket Pernikahan</h1>
            <div>
                <a href="{{ route('admin.paket_pernikahan.create') }}">+ Tambah</a>
            </div>
        </div>

        <div>
            <table>
                <thead>
                    <tr>
                        <td class="border px-4 py-2">Nama Paket</td>
                        <td class="border px-4 py-2">Harga DP</td>
                        <td class="border px-4 py-2">Venue</td>
                        <td class="border px-4 py-2">Dekorasi</td>
                        <td class="border px-4 py-2">Tata Rias</td>
                        <td class="border px-4 py-2">Catering</td>
                        <td class="border px-4 py-2">Kue Pernikahan</td>
                        <td class="border px-4 py-2">Fotografer</td>
                        <td class="border px-4 py-2">Entertaiment</td>
                        <td class="border px-4 py-2">Staff Acara</td>
                        <td class="border px-4 py-2">Harga Lunas</td>
                        <td class="border px-4 py-2">Status Paket</td>
                        <td class="border px-4 py-2">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paketPernikahans as $paketPernikahan)
                        <tr>
                            <td class="border px-4 py-2">{{ $paketPernikahan->nama_paket }}</td>
                            <td class="border px-4 py-2">{{ $paketPernikahan->status_paket }}</td>

                            <td class="border px-4 py-2">{{ $paketPernikahan->venueUsaha->nama_usaha ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $paketPernikahan->dekorasiUsaha->nama_usaha ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $paketPernikahan->tataRiasUsaha->nama_usaha ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $paketPernikahan->cateringUsaha->nama_usaha ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $paketPernikahan->kuePernikahUsaha->nama_usaha ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $paketPernikahan->fotograferUsaha->nama_usaha ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $paketPernikahan->entertaimentUsaha->nama_usaha ?? '-' }}</td>
                            
                            <td class="border px-4 py-2">{{ $paketPernikahan->staff_acara }}</td>
                            <td class="border px-4 py-2">Rp {{ number_format($paketPernikahan->hargaDP_paket, 0, ',', '.') }}</td>
                            <td class="border px-4 py-2">Rp {{ number_format($paketPernikahan->hargaLunas_paket, 0, ',', '.') }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('admin.paket_pernikahan.show', $paketPernikahan->id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-layout>