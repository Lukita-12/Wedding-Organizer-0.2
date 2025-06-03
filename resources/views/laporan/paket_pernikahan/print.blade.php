<x-layout>
    <div style="background-color: white; font-family:'Times New Roman', Times, serif; text-align: center; padding: 1rem">

        <!-- heading -->
        <div style="margin-bottom: 1rem;">
            <div> 
                <p style="font-weight: bold; font-size: x-large;">Laporan Paket Perniakahan</p>
                <p style="font-weight: bold; font-size: x-large;">Hatma Wedding Organizer</p>
                <p style="font-weight: bold; font-size: x-large;">Tahun 2025</p>
            </div>

            <div>
                <p style="font-size: small;">Jalan Sepakat Rt. 33 No. 12 Kelurahan, Pemurus Dalam, Kec.</p>
                <p style="font-size: small;">Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan</p>
                <p style="font-size: small;">70236</p>
            </div>
        </div>
        
        <!-- table -->
        <div style="margin-bottom: 1rem;">
            <table>
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Nama Paket</td>
                        <td>User</td>
    
                        <td>Venue</td>
                        <td>Dekorasi</td>
                        <td>Tata Rias</td>
                        <td>Catering</td>
                        <td>Kue Pernikahan</td>
                        <td>Fotografer</td>
                        <td>Entertainment</td>
                        <td>Staff Acara</td>
    
                        <td>Harga 01</td>
                        <td>Harga 02</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paketPernikahans as $paketPernikahan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $paketPernikahan->nama_paket }}</td>
                            <td>{{ $paketPernikahan->user->name ?? '-' }}</td>
    
                            <td>{{ $paketPernikahan->venueUsaha         ->requestMitra->nama_usaha ?? '-' }}</td>
                            <td>{{ $paketPernikahan->dekorasiUsaha      ->requestMitra->nama_usaha ?? '-' }}</td>
                            <td>{{ $paketPernikahan->tataRiasUsaha      ->requestMitra->nama_usaha ?? '-' }}</td>
                            <td>{{ $paketPernikahan->cateringUsaha      ->requestMitra->nama_usaha ?? '-' }}</td>
                            <td>{{ $paketPernikahan->kuePernikahanUsaha ->requestMitra->nama_usaha ?? '-' }}</td>
                            <td>{{ $paketPernikahan->fotograferUsaha    ->requestMitra->nama_usaha ?? '-' }}</td>
                            <td>{{ $paketPernikahan->entertainmentUsaha ->requestMitra->nama_usaha ?? '-' }}</td>
                            <td>{{ $paketPernikahan->staff_acara ?? '-' }}</td>
    
                            <td>Rp. {{ number_format($paketPernikahan->hargaDP_paket, 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($paketPernikahan->hargaLunas_paket, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- footing -->
        <div style="display: flex; justify-content: flex-end; padding-right: 4rem;">
            <div style="text-align: center;">
                <p style="font-size: small;">Hari, 00 Bulan Tanggal</p>
                <p style="font-weight: bold;">OWNER HATMA GROUP</p>
                <p style="font-weight: bold; text-decoration: underline; margin-top: 4rem;">Akbar Hatma</p>
            </div>
        </div>
    </div>
</x-layout>

<style>
    table, thead, tbody, tr, td {
    border: 1px solid;
    }

    table {
    width: 100%;
    border-collapse: collapse;
    }
</style>