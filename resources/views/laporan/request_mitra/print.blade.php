<x-layout>
    <div class="h-screen bg-white flex flex-col justify-center px-10 gap-6">
        <div class="flex flex-col gap-1">
            <div class="text-center">
                <p class="poppins-bold text-2xl">LAPORAN PERMINTAAN KERJASAMA</p>
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
                    <td class="poppins-semibold text-center px-3 py-1 border">Nama Pelanggan</td>
                    <td class="poppins-semibold text-center px-3 py-1 border">No. Telp/WA</td>

                    <td class="poppins-semibold text-center px-3 py-1 border">Nama Pemilik</td>
                    <td class="poppins-semibold text-center px-3 py-1 border">Nama Usaha</td>
                    <td class="poppins-semibold text-center px-3 py-1 border">Jenis Usaha</td>
                    <td class="poppins-semibold text-center px-3 py-1 border">Status Permintaan</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($requestMitras as $requestMitra)
                    <tr>
                        <td class="poppins text-center text-sm px-3 py-1 border">{{ $loop->iteration }}</td>
                        <td class="poppins text-center text-sm px-3 py-1 border">{{ $requestMitra->pelanggan->nama_pelanggan }}</td>
                        <td class="poppins text-center text-sm px-3 py-1 border">{{ $requestMitra->pelanggan->noTelp_pelanggan }}</td>

                        <td class="poppins text-center text-sm px-3 py-1 border">{{ $requestMitra->nama_pemilik }}</td>
                        <td class="poppins text-center text-sm px-3 py-1 border">{{ $requestMitra->nama_usaha }}</td>
                        <td class="poppins text-center text-sm px-3 py-1 border">{{ $requestMitra->jenis_usaha }}</td>
                        <td class="poppins text-center text-sm px-3 py-1 border">{{ $requestMitra->status_request }}</td>
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