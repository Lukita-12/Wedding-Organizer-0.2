<x-layout>

    <div>
        <h1>Permintaan kerjasama</h1>
        <div>
            <form method="GET" action="{{ route('admin.request_mitra.index') }}">
                <input type="text"
                    name="search_request"
                    value="{{ request('search_request') }}" placeholder="Search..."
                    class="" />
                    <button type="submit">Cari</button>
            </form>
        </div>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <td>Nama usaha</td>
                    <td>Jenis Usaha</td>
                    <td>Pemilik usaha</td>
                    <td>Status permintaan</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($requestMitras as $requestMitra)
                    <tr>
                        <td>{{ $requestMitra->nama_usaha }}</td>
                        <td>{{ $requestMitra->jenis_usaha }}</td>
                        <td>{{ $requestMitra->nama_pemilik }}</td>
                        <td>{{ $requestMitra->status_request }}</td>
                        <td>
                            <div>
                                @if ($requestMitra->status_request !== 'Diterima')
                                    <form method="POST" action="{{ route('admin.request_mitra.accept', $requestMitra->id) }}"
                                        onsubmit="return confirm('Apakah anda yakin untuk menerima permintaan kerjasama?')">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit">Terima</button>
                                    </form>
                                @endif

                                @if ($requestMitra->status_request !== 'Ditolak')
                                    <form method="POST" action="{{ route('admin.request_mitra.reject', $requestMitra->id) }}"
                                        onsubmit="return confirm('Apakah anda yakin untuk menolak permintaan kerjasama?')">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit">Tolak</button>
                                    </form>
                                @endif
                            </div>
                            <div>
                                <a href="{{ route('admin.request_mitra.show', $requestMitra->id) }}">Lihat</a>
                                <a href="#">Edit</a>
                                <form method="POST" action="#">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>