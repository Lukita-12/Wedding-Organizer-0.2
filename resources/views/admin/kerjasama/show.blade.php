<x-layout>
    <div>
        <h1>Informasi Kerjasama</h1>
        <div>
            <p><strong>Nama pelanggan:</strong> {{ $kerjasama->pelanggan->nama_pelanggan }}</p>
            <p><strong>Nama pemilik:</strong> {{ $kerjasama->nama_pemilik }}</p>
            <p><strong>Nama usaha:</strong> {{ $kerjasama->nama_usaha }}</p>
            <p><strong>Jenis usaha:</strong> {{ $kerjasama->jenis_usaha }}</p>
        </div>
        <div>
            <a href="{{ route('admin.kerjasama.index') }}">Kembali</a>
            <a href="{{ route('admin.kerjasama.edit', $kerjasama->id) }}">Edit</a>
        </div>
    </div>
</x-layout>