<x-layout>

    <div>
        @if (session('sukses'))<div>{{ session('sukses') }}</div> @endif
    </div>

    <div>
        <h1>Permintaan kerjasama</h1>
        <!-- Search -->
        <div>
            <form method="GET" action="{{ route('admin.request_mitra.index') }}">
                <input type="text"
                    name="search_request"
                    value="{{ request('search_request') }}" placeholder="Search..."
                    class="" />
                    <button type="submit">Cari</button>
            </form>
        </div>
        <!-- Filter -->
        <div>
            <form method="GET" action="{{ route('admin.request_mitra.index') }}">
                <label for="status_request">Filter status:</label>
                <select name="status_request" id="status_request"
                    onchange="this.form.submit()">
                    <option value="">Semua</option>
                    <option value="Ditunggu" @selected(request('status_request') === 'Ditunggu')>Ditunggu</option>
                    <option value="Diterima" @selected(request('status_request') === 'Diterima')>Diterima</option>
                    <option value="Ditolak" @selected(request('status_request') === 'Ditolak')>Ditolak</option>
                </select>
            </form>
        </div>
    </div>

    <div>
        <table>
            @php
                function sortLink($column, $label, $currentSortBy, $currentSortOrder) {
                    $newOrder = ($currentSortBy === $column && $currentSortOrder === 'asc') ? 'desc' : 'asc';
                    $query = array_merge(request()->query(), ['sort_by' => $column, 'sort_order' => $newOrder]);
                    return '<a href="' . route('admin.request_mitra.index', $query) . '" class="underline">' . $label . '</a>';
                }
            @endphp
            <thead>
                <tr>
                    <td>{!! sortLink('nama_usaha', 'Nama Usaha', $sortBy, $sortOrder) !!}</td>
                    <td>{!! sortLink('jenis_usaha', 'Jenis usaha', $sortBy, $sortOrder) !!}</td>
                    <td>{!! sortLink('nama_pemilik', 'Nama pemilik', $sortBy, $sortOrder) !!}</td>
                    <td>{{!! sortLink('status_request', 'Status permintaan', $sortBy, $sortOrder) !!}}</td>
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

    <div>
        {{ $requestMitras->links() }}
    </div>

</x-layout>