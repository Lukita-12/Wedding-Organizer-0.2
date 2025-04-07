<x-layout>

    <div>
        <h1>Informasi pelanggan</h1>
    </div>
    <div>
        <p><strong>Nama lengkap:</strong> {{ $pelanggan->nama_pelanggan }}</p>
        <p><strong>Jenis kelamin:</strong> {{ $pelanggan->jk_pelanggan }}</p>
        <p><strong>No. Telepon/WA:</strong> {{ $pelanggan->noTelp_pelanggan }}</p>
        <p><strong>Email:</strong> {{ $pelanggan->email_pelanggan }}</p>
        <p><strong>Alamat:</strong> {{ $pelanggan->alamat_pelanggan }}</p>
    </div>
    <div>
        <a href="{{ url('/') }}">Kembali</a>
    </div>
</x-layout>