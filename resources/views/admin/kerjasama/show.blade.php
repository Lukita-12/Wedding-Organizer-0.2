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
            <a href="{{ route('admin.kerjasama.index') }}">Kembali</a>
            <a href="{{ route('admin.kerjasama.edit', $kerjasama->id) }}">Edit</a>
            <form method="POST" action="{{ route('admin.kerjasama.destroy', $kerjasama->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </div>
    </div>
</x-layout>