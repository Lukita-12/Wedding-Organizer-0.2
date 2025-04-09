<x-layout>

    <div>
        <div class="">
            <h2>Detail Paket: {{ $paketPernikahan->nama_paket }}</h2>

            <p><strong>Nama Paket: </strong>{{ $paketPernikahan->nama_paket }}</p>
            <p><strong>Venue: </strong>{{ optional($paketPernikahan->venue)->nama_usaha ?? '-' }}</p>
            <p><strong>Dekorasi: </strong>{{ optional($paketPernikahan->dekorasi)->nama_usaha ?? '-' }}</p>
            <p><strong>Tata Rias: </strong>{{ optional($paketPernikahan->tata_rias)->nama_usaha ?? '-' }}</p>
            <p><strong>Catering: </strong>{{ optional($paketPernikahan->cateing)->nama_usaha ?? '-' }}</p>
            <p><strong>Kue Pernikahan: </strong>{{ optional($paketPernikahan->kue_pernikahan)->nama_usaha ?? '-' }}</p>
            <p><strong>Fotografer: </strong>{{ optional($paketPernikahan->fotografer)->nama_usaha ?? '-' }}</p>
            <p><strong>Entertainment: </strong>{{ optional($paketPernikahan->entertainment)->nama_usaha ?? '-' }}</p>
            <p><strong>Staff Acara: </strong>{{ $paketPernikahan->staff_acara }}</p>
            <p><strong>Harga DP: </strong>Rp {{ number_format($paketPernikahan->hargaDP_paket, 0, ',', '.') }}</p>
            <p><strong>Harga Lunas: </strong>Rp {{ number_format($paketPernikahan->hargaLunas_paket, 0, ',', '.') }}</p>
            <p><strong>Status: </strong>{{ $paketPernikahan->status_paket }}</p>
        </div>
    </div>

    <div>
        <a href="{{ route('admin.paket_pernikahan.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('admin.paket_pernikahan.edit', $paketPernikahan->id) }}">Edit</a>
        <form method="POST" action="{{ route('admin.paket_pernikahan.delete', $paketPernikahan->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </div>

</x-layout>