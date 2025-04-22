<x-layout>

    <div>
        <h1>Informasi Kerjasama</h1>
        <div>
            <p><strong>Nama pelanggan:</strong> {{ $kerjasama->requestMitra->pelanggan->nama_pelanggan }}</p>
            <p><strong>Nama pemilik:</strong> {{ $kerjasama->requestMitra->nama_pemilik }}</p>
            <p><strong>Nama usaha:</strong> {{ $kerjasama->requestMitra->nama_usaha }}</p>
            <p><strong>Jenis usaha:</strong> {{ $kerjasama->requestMitra->jenis_usaha }}</p>
        </div>
        <div>
            <a href="{{ route('customer.kerjasama.index') }}">Kembali</a>
            <a href="{{ route('customer.kerjasama.edit', $kerjasama->id) }}">Edit</a>
        </div>
    </div>

</x-layout>