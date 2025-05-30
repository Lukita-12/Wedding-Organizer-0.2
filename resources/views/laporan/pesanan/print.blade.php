<x-layout>
    <div class="h-screen bg-white flex flex-col justify-center px-10 gap-6">
        <div class="flex flex-col gap-1">
            <div class="text-center">
                <p class="poppins-bold text-2xl">LAPORAN PESANAN</p>
                <p class="poppins-bold text-2xl">HATMA WEDDING ORGANIZER</p>
                <p class="poppins-bold text-2xl">TAHUN ......../........</p>
            </div>
    
            <div class="text-center">
                <p class="poppins-medium text-sm">Jalan Sepakat Rt. 33 No. 12 Kelurahan, Pemurus Dalam, Kec.</p>
                <p class="poppins-medium text-sm">Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan</p>
                <p class="poppins-medium text-sm">70236</p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <td class="poppins-semibold text-center px-3 py-1 border">No.</td>
                    <td class="poppins-semibold text-center px-3 py-1 border">Pelanggan</td>
                    <td class="poppins-semibold text-center px-3 py-1 border">Paket Pernikahan</td>
    
                    <td class="poppins-semibold text-center px-3 py-1 border">Tanggal Pesanan</td>
                    <td class="poppins-semibold text-center px-3 py-1 border">Pengantin Pria</td>
                    <td class="poppins-semibold text-center px-3 py-1 border">Pengantin Wanita</td>
                    <td class="poppins-semibold text-center px-3 py-1 border">Tanggal Acara</td>
                    <td class="poppins-semibold text-center px-3 py-1 border">Tanggal Diskusi</td>
                    <td class="poppins-semibold text-center px-3 py-1 border">Total Pesanan</td>
                    <td class="poppins-semibold text-center px-3 py-1 border">Status Pesanan</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanans as $pesanan)
                    <tr>
                        <td class="poppins text-center text-sm px-3 py-1 border">{{ $loop->iteration }}</td>
                        <td class="poppins text-center text-sm px-3 py-1 border">{{ $pesanan->pelanggan->nama_pelanggan }}</td>
                        <td class="poppins text-center text-sm px-3 py-1 border">{{ $pesanan->paketPernikahan->nama_paket ?? '-' }}</td>
        
                        <td class="poppins text-center text-sm px-3 py-1 border">{{ $pesanan->tgl_pesanan->format('d m Y') }}</td>
                        <td class="poppins text-center text-sm px-3 py-1 border">{{ $pesanan->pengantin_pria }}</td>
                        <td class="poppins text-center text-sm px-3 py-1 border">{{ $pesanan->pengantin_wanita }}</td>
                        <td class="poppins text-center text-sm px-3 py-1 border">{{ $pesanan->tanggal_diskusi->format('d m Y') }}</td>
                        <td class="poppins text-center text-sm px-3 py-1 border">{{ $pesanan->tanggal_acara->format('d m Y') }}</td>
                        <td class="poppins text-center text-sm px-3 py-1 border">Rp. {{ number_format($pesanan->total_harga_pesanan, 0, ',', '.') }}</td>
                        <td class="poppins text-center text-sm px-3 py-1 border">{{ $pesanan->status_pesanan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="h-24 flex justify-end px-14">
            <div class="w-fit flex flex-col justify-between text-center">
                <p class="poppins-bold">OWNER HATMA GROUP</p>
                <p class="poppins-medium text-sm underline">AKBAR HATMA</p>
            </div>
        </div>
    </div>
</x-layout>