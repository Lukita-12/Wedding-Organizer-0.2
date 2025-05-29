<x-layout>
    <div class="h-screen flex justify-center items-center">

        <div class="w-224 h-155 bg-white flex flex-col justify-center items-center gap-4">
            <div class="flex flex-col">
                <div class="text-center">
                    <p class="poppins-bold text-slate-700 text-xl">LAPORAN PERMINTAAN KERJASAMA</p>
                    <p class="poppins-bold text-slate-700 text-xl">HATMA WEDDING ORGANIZER</p>
                    <p class="poppins-bold text-slate-700 text-xl">TAHUN ....../......</p>
                </div>
    
                <div class="text-center">
                    <p class="poppins-medium text-slate-700 text-sm">Jalan Sepakat Rt. 33 No. 12 Kelurahan, Pemurus Dalam, Kec.</p>
                    <p class="poppins-medium text-slate-700 text-sm">Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan</p>
                    <p class="poppins-medium text-slate-700 text-sm">70236</p>
                </div>
            </div>
    
            <table>
                <thead>
                    <tr>
                        <td class="poppins-semibold text-slate-700 text-center text-xs whitespace-nowrap px-2 py-2 border border-slate-700">No.</td>
                        <td class="poppins-semibold text-slate-700 text-center text-xs whitespace-nowrap px-3 py-2 border border-slate-700">Nama Pelanggan</td>
                        <td class="poppins-semibold text-slate-700 text-center text-xs whitespace-nowrap px-3 py-2 border border-slate-700">No. Telp/WA</td>
                        <td class="poppins-semibold text-slate-700 text-center text-xs whitespace-nowrap px-3 py-2 border border-slate-700">Nama Pemilik</td>
                        <td class="poppins-semibold text-slate-700 text-center text-xs whitespace-nowrap px-3 py-2 border border-slate-700">Nama Usaha</td>
                        <td class="poppins-semibold text-slate-700 text-center text-xs whitespace-nowrap px-3 py-2 border border-slate-700">Jenis Usaha</td>
                        <td class="poppins-semibold text-slate-700 text-center text-xs whitespace-nowrap px-3 py-2 border border-slate-700">Status Permintaan</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requestMitras as $requestMitra)
                        <tr>
                            <td class="poppins text-slate-700 text-center text-xs whitespace-nowrap px-2 py-2 border border-slate-700">{{ $loop->iteration }}</td>
                            <td class="poppins text-slate-700 text-center text-xs whitespace-nowrap px-3 py-2 border border-slate-700">{{ $requestMitra->pelanggan->nama_pelanggan }}</td>
                            <td class="poppins text-slate-700 text-center text-xs whitespace-nowrap px-3 py-2 border border-slate-700">{{ $requestMitra->pelanggan->noTelp_pelanggan }}</td>
                            <td class="poppins text-slate-700 text-center text-xs whitespace-nowrap px-3 py-2 border border-slate-700">{{ $requestMitra->nama_pemilik }}</td>
                            <td class="poppins text-slate-700 text-center text-xs whitespace-nowrap px-3 py-2 border border-slate-700">{{ $requestMitra->nama_usaha }}</td>
                            <td class="poppins text-slate-700 text-center text-xs whitespace-nowrap px-3 py-2 border border-slate-700">{{ $requestMitra->jenis_usaha }}</td>
                            <td class="poppins text-slate-700 text-center text-xs whitespace-nowrap px-3 py-2 border border-slate-700">{{ $requestMitra->status_request }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="w-full h-20 flex justify-end px-24">
                <div class="w-fit flex flex-col justify-between text-center">
                    <p class="poppins-bold text-slate-700">OWNER HATMA GROUP</p>
                    <p class="poppins-medium text-slate-700 text-sm underline">AKBAR HATMA</p>
                </div>
            </div>
        </div>

    </div>
</x-layout>