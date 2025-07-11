<x-layout-home>
    <div class="h-155 bg-teal-700 flex flex-col items-center p-5 gap-4 shadow shadow-slate-500">
        <span class="poppins-semibold text-slate-100 text-3xl text-center">
            Paket Pernikahan
        </span>
        
        <div class="w-full grid grid-cols-4 justify-center px-12 gap-3 overflow-auto">
            @foreach ($paketPernikahans as $paketPernikahan)
                @php
                    $imagePath = asset('storage/' . $paketPernikahan->upload_file);
                @endphp
                <div class="bg-slate-200 w-full flex flex-col px-1 py-1 gap-1 shadow shadow-500/80 shadow shadow-slate-500">
                    <div class="h-45 bg-cover bg-center flex justify-end items-end" style="background-image: url('{{ $imagePath }}')">
                        <div class="w-full flex justify-end items-end backdrop-blur-sm p-1">
                            <a href="{{ route('customer.pesanan.create', ['paket_id' => $paketPernikahan->id]) }}" target="_blank" class="poppins-medium h-fit bg-teal-500 text-slate-100 text-center px-3 py-1 transition delay-50 duration-500 hover:bg-teal-700">
                                Pesan
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-col justify-between px-2 gap-3">
                        <div class="flex justify-between items-end">
                            <span class="poppins-semibold text-slate-700 text-xl">
                                {{ $paketPernikahan->nama_paket }}
                            </span>
                        </div>

                        <span class="poppins text-slate-600 text-md text-end">
                            Rp. {{ $paketPernikahan->hargaDP_paket }} - {{ $paketPernikahan->hargaLunas_paket }}
                        </span>
                    </div>

                    <div class="px-3 poppins text-slate-700">
                        <table class="w-full">
                            <tbody>
                                <tr>
                                    <td class="py-1 ">Venue</td>
                                    <td class="py-1 text-teal-700 text-end">{{ $paketPernikahan->venue ? '✔' : '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1 ">Dekorasi</td>
                                    <td class="py-1 text-teal-700 text-end">{{ $paketPernikahan->dekorasi ? '✔' : '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1 ">Tata rias</td>
                                    <td class="py-1 text-teal-700 text-end">{{ $paketPernikahan->tata_rias ? '✔' : '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1 ">Catering</td>
                                    <td class="py-1 text-teal-700 text-end">{{ $paketPernikahan->catering ? '✔' : '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1 ">Kue pernikahan</td>
                                    <td class="py-1 text-teal-700 text-end">{{ $paketPernikahan->kue_pernikahan ? '✔' : '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1 ">Fotografer</td>
                                    <td class="py-1 text-teal-700 text-end">{{ $paketPernikahan->fotografer ? '✔' : '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1 ">Entertainment</td>
                                    <td class="py-1 text-teal-700 text-end">{{ $paketPernikahan->entertainment ? '✔' : '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1 ">Staff Acara</td>
                                    <td class="py-1 text-teal-700 text-end">{{ $paketPernikahan->staff_acara ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout-home>