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
            <a href="{{ route('customer.kerjasama.index') }}">Kembali</a>
            <a href="{{ route('customer.kerjasama.edit', $kerjasama->id) }}">Edit</a>
            <form method="POST" action="{{ route('customer.kerjasama.delete', $kerjasama->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </div>
    </div>

</x-layout>