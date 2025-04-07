<x-layout>

    <div>
        <div>
            <h2>Informasi usaha</h2>
            <p><strong>Nama usaha:</strong> {{ $requestMitra->nama_usaha }}</p>
            <p><strong>Jenis usaha:</strong> {{ $requestMitra->jenis_usaha }}</p>
        </div>

        <div>
            <h2>Informasi pelanggan</h2>
            @if ($requestMitra->pelanggan)
                <p><strong>Nama:</strong> {{ $requestMitra->pelanggan->nama_pelanggan }}</p>
                <p><strong>Email:</strong> {{ $requestMitra->pelanggan->email_pelanggan }}</p>
            @else
                <p>Tidak ada data pelanggan yang ditemukan</p>
            @endif
        </div>
        <div>
            <a href="{{ route('admin.request_mitra.index') }}">Kembali</a>
        </div>
    </div>

</x-layout>