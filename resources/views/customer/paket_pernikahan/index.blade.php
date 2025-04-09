<x-layout>

    <div>
        @foreach ($paketPernikahans as $paketPernikahan)
            <div class="card">
                <h2>{{ $paketPernikahan->nama_paket }}</h2>
                <p>Harga: Rp{{ number_format($paketPernikahan->hargaLunas_paket, 0, ',', '.') }}</p>
                <p>Status: {{ $paketPernikahan->status_paket }}</p>
                <a href="{{ route('customer.pesanan.create', ['paket-pernikahan' => $paketPernikahan->id]) }}">
                    Pesan Sekarang
                </a>
            </div>
        @endforeach
    </div>

</x-layout>