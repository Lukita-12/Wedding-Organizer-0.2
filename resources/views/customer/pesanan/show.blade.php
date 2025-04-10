<x-layout>

    <div>
        <h2>Detail Pesanan</h2>

        <ul>
            <li><strong>Pengantin Pria:</strong> {{ $pesanan->pengantin_pria }}</li>
            <li><strong>Pengantin Wanita:</strong> {{ $pesanan->pengantin_wanita }}</li>
            <li><strong>Tanggal Acara:</strong> {{ $pesanan->tanggal_acara->format('d M Y') }}</li>
            <li><strong>Status:</strong> {{ $pesanan->status_pesanan }}</li>
        </ul>

        @if ($pesanan->paketPernikahan)
            <hr>
            <h4>Paket Eksklusif</h4>
            <ul>
                <li><strong>Nama Paket:</strong> {{ $pesanan->paketPernikahan->nama_paket }}</li>
                <li><strong>Harga DP:</strong> Rp{{ number_format($pesanan->paketPernikahan->hargaDP_paket, 0, ',', '.') }}</li>
                <li><strong>Harga Lunas:</strong> Rp{{ number_format($pesanan->paketPernikahan->hargaLunas_paket, 0, ',', '.') }}</li>
                <li><strong>Status Paket:</strong> {{ $pesanan->paketPernikahan->status_paket }}</li>
            </ul>
        @endif

        <div>
            <a href="{{ route('customer.pesanan.index') }}">Kembali</a>
        </div>
    </div>

</x-layout>