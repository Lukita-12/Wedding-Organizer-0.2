<x-layout>
    <div>
        <h1>Pembayaran</h1>
        
        <div>
            <table>
                <thead>
                    <tr>
                        <td class="border px-4 py-2">No.</td>
                        <td class="border px-4 py-2">Nama paket</td>
                        <td class="border px-4 py-2">User</td>
                        <td class="border px-4 py-2">Tanggal pembayaran</td>
                        <td class="border px-4 py-2">Bukti pembayaran</td>
                        <td class="border px-4 py-2">Bayar DP</td>
                        <td class="border px-4 py-2">Bayar lunas</td>
                        <td class="border px-4 py-2">Total pesanan</td>
                        <td class="border px-4 py-2">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembayarans as $index => $pembayaran)
                        <tr>
                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $pembayaran->pesanan->paketPernikahan->nama_paket }}</td>
                            <td class="border px-4 py-2">{{ $pembayaran->pesanan->user->name }}</td>
                            <td class="border px-4 py-2">{{ $pembayaran->tgl_pembayaran->format('d-M-Y') }}</td>
                            <td class="border px-4 py-2">{{ $pembayaran->bukti_pembayaran }}</td>
                            <td class="border px-4 py-2">{{ $pembayaran->bayar_dp }}</td>
                            <td class="border px-4 py-2">{{ $pembayaran->bayar_lunas }}</td>
                            <td class="border px-4 py-2">{{ $pembayaran->pesanan->total_harga_pesanan }}</td>
                            <td class="border px-4 py-2">
                                <a href="#">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>