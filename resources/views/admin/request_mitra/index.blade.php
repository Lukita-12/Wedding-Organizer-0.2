<x-layout-dashboard>

    <div class="w-full bg-slate-200 flex flex-col shadow shadow-slate-500">
        <div class="w-full flex justify-between items-center px-4 py-2 border-b-2 border-slate-500">
            <span class="poppins-semibold text-slate-700 text-2xl">Permintaan Kerjasama</span>

            <form method="GET" action="{{ route('admin.request_mitra.search') }}">
                <input type="text" name="search" value="{{ request('search') }}" class="bg-slate-100 inter-medium px-3 py-1">
                <button type="submit" class="bg-slate-500 poppins-semibold text-slate-100 px-3 py-1">Cari</button>
            </form>
        </div>

        <div class="overflow-auto">
            <table>
                <thead>
                    <tr>
                        <td class="poppins-semibold text-slate-700 text-center text-lg px-4 py-2 whitespace-nowrap">No.</td>
                        <td class="poppins-semibold text-slate-700 text-center text-lg px-12 py-2 whitespace-nowrap">Nama Pelanggan</td>
                        <td class="poppins-semibold text-slate-700 text-center text-lg px-12 py-2 whitespace-nowrap">Nama Usaha</td>
                        <td class="poppins-semibold text-slate-700 text-center text-lg px-12 py-2 whitespace-nowrap">Jenis Usaha</td>
                        <td class="poppins-semibold text-slate-700 text-center text-lg px-12 py-2 whitespace-nowrap">Nama Pemilik</td>
                        <td class="poppins-semibold text-slate-700 text-center text-lg px-12 py-2 whitespace-nowrap">Status Permintaan</td>
                        <td class="poppins-semibold text-slate-700 text-center text-lg px-12 py-2 whitespace-nowrap">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requestMitras as $requestMitra)
                        <tr class="odd:bg-slate-100 even:bg-slate-200">
                            <td class="poppins text-slate-700 text-center px-4 py-3 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="poppins text-slate-700 text-center px-12 py-3 whitespace-nowrap">{{ $requestMitra->pelanggan->nama_pelanggan }}</td>
                            <td class="poppins text-slate-700 text-center px-12 py-3 whitespace-nowrap">{{ $requestMitra->nama_usaha }}</td>
                            <td class="poppins text-slate-700 text-center px-12 py-3 whitespace-nowrap">{{ $requestMitra->jenis_usaha }}</td>
                            <td class="poppins text-slate-700 text-center px-12 py-3 whitespace-nowrap">{{ $requestMitra->nama_pemilik }}</td>
                            <td class="poppins text-slate-700 text-center px-12 py-3 whitespace-nowrap">{{ $requestMitra->status_request }}</td>
                            <td class="poppins text-slate-700 text-center px-12 py-3 whitespace-nowrap">
                                <div class="w-full flex justify-center gap-2">
                                    <form method="POST" action="{{ route('admin.request_mitra.accept', $requestMitra->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="border border-teal-500 px-3 poppins text-teal-500 text-sm rounded-full">Terima</button>
                                    </form>
                                    
                                    <form method="POST" action="{{ route('admin.request_mitra.reject', $requestMitra->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="border border-red-500 px-3 poppins text-red-500 text-sm rounded-full transition duration:250 hover:bg-red-500 hover:text-slate-100">Tolak</button>
                                    </form>

                                    <a href="#" class="inline-block border border-green-500 px-3 poppins text-green-500 text-sm rounded-full">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>

</x-layout-dashboard>