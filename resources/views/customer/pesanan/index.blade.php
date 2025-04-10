<x-layout>

    <div class="container">
        <h1>Pesanan Saya</h1>

        @if($pesanans->isEmpty())
            <p>Belum ada pesanan.</p>
        @else
            @foreach($pesanans as $pesanan)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $pesanan->paketPernikahan?->nama_paket ?? 'Tanpa Paket' }}
                        </h5>
                        <p class="card-text">
                            Tanggal Acara: {{ ($pesanan->tanggal_acara)->format('d M Y') }} <br>
                            Diskusi: {{ ($pesanan->tanggal_diskusi)->format('d M Y') }} <br>
                            Status: {{ ucfirst($pesanan->status_pesanan) }}
                        </p>
                    </div>
                </div>
                <div>
                    @can('update', $pesanan)
                        <a href="{{ route('customer.pesanan.edit', $pesanan) }}" class="btn btn-warning">Edit</a>
                    @endcan

                    @can('delete', $pesanan)
                        <form action="{{ route('customer.pesanan.destroy', $pesanan) }}" method="POST" style="display:inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin membatalkan?')">Batalkan</button>
                        </form>
                    @endcan
                </div>
            @endforeach
        @endif
    </div>

</x-layout>