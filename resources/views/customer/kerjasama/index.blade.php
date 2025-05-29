<x-layout-home>
    <div class="w-full bg-teal-700 h-108 flex px-3 py-2">
        <div class="w-full h-full bg-[url('/public/images/snowing.jpg')] bg-cover bg-center"></div>

        <div class="w-full bg-slate-100 flex flex-col justify-center items-center gap-5">
            <span class="w-xl poppins-semibold text-slate-700 text-4xl text-center px-3 py-1">BUAT KERJASAMA DENGAN HATMA WEDDING ORGANIZER</span>
            @auth
                <a href="{{ route('customer.request_mitra.create') }}" class="w-1/4 poppins-semibold bg-teal-500 text-slate-100 text-2xl text-center px-3 py-1 transition delay-50 duration-300 hover:bg-teal-700">DAFTAR</a>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="w-1/4 poppins-semibold bg-teal-500 text-slate-100 text-2xl text-center px-3 py-1 transition delay-50 duration-300 hover:bg-teal-700">Log In</a>
            @endguest
        </div>
    </div>

    <div class="h-160 flex flex-col items-center py-6 gap-3">
        <span class="poppins-semibold text-teal-700 text-center text-3xl">
            Kerjasama
        </span>

        <div class="grid grid-cols-4 gap-3 py-4 overflow-auto">
            @foreach ($requestMitras as $requestMitra)
                <div class="bg-teal-700 flex flex-col px-2 py-3 gap-2 shadow shadow-slate-500">
                    <div class="flex justify-between items-center">
                        <span class="w-fit bg-slate-100 poppins-medium text-teal-700 text-lg px-3 rounded-sm">{{ $requestMitra->jenis_usaha ?? '-' }}</span>
                        @if ($requestMitra->kerjasama)
                            <a href="{{ route('customer.kerjasama.edit', $requestMitra->kerjasama->id) }}" class="inline-block w-fit h-fit poppins-semibold bg-teal-500 text-slate-100 text-center px-3 py-1 transition delay-50 duration-300 hover:bg-teal-600 rounded-sm">
                                Edit
                            </a>
                        @else
                            <span class="poppins-medium text-slate-100">{{ $requestMitra->status_request }}</span>
                        @endif
                    </div>
                    <div class="flex flex-col">
                        <span class="poppins-semibold text-slate-100 text-lg">{{ $requestMitra->nama_usaha ?? '-' }}</span>
                        <span class="poppins text-slate-300">{{ $requestMitra->nama_pemilik ?? '-' }}</span>
                        
                        @php
                            $imagePath = $requestMitra->kerjasama->upload_file ?? null;
                        @endphp
                        <img src="{{ asset($imagePath ? 'storage/' . $imagePath : 'images/forest-winter.jpg') }}" alt="Kerjasama"
                            class="h-40 bg-cover bg-center">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout-home>