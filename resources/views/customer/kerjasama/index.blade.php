<x-layout-home>
    <div class="w-full h-108 flex">
        <div class="w-full h-full bg-[url('/public/images/snowing.jpg')] bg-cover bg-center"></div>

        <div class="w-full flex flex-col justify-center items-center gap-5">
            <span class="w-xl poppins-semibold text-slate-700 text-4xl text-center px-3 py-1">BUAT KERJASAMA DENGAN HATMA WEDDING ORGANIZER</span>
            @auth
                <a href="{{ route('customer.request_mitra.create') }}" class="w-1/4 poppins-semibold bg-teal-500 text-slate-100 text-2xl text-center px-3 py-1 transition delay-50 duration-300 hover:bg-teal-700">DAFTAR</a>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="w-1/4 poppins-semibold bg-teal-500 text-slate-100 text-2xl text-center px-3 py-1 transition delay-50 duration-300 hover:bg-teal-700">Log In</a>
            @endguest
        </div>
    </div>

    <div class="flex flex-col w-full h-108 px-4 py-2 gap-3 overflow-y-auto">
        <span class="poppins-semibold text-slate-700 text-2xl">Kerjasama</span>
        <div class="grid grid-cols-2 gap-3">
            @foreach ($requestMitras as $requestMitra)
                <div class="h-fit bg-slate-200 flex justify-between items-end shadow shadow-slate-500/80">
                    <div class="flex items-center gap-2">
                        @if ($requestMitra->kerjasama)
                            @php
                                $imagePath = $requestMitra->kerjasama->upload_file ?? null;
                            @endphp
                            <img src="{{ asset($imagePath ? 'storage/' . $imagePath : 'images/forest-winter.jpg') }}"
                                alt="Thumbnail" class="{{ $imagePath ? 'w-20 h-20 object-cover object-center' : 'w-20 h-20 object-cover object-center' }}">
                        @else
                            <img src="{{ asset('images/forest-winter.jpg') }}" class="w-20 h-20 object-cover object-center">
                        @endif                            
                        <div class="flex flex-col">
                            <span class="poppins-medium text-slate-700 text-lg">{{ $requestMitra->nama_usaha ?? '-' }}</span>
                            <span class="poppins text-slate-700 text-sm">{{ $requestMitra->nama_pemilik ?? '-' }}</span>
                            <span class="poppins text-slate-700 text-sm mt-3">{{ $requestMitra->jenis_usaha ?? '-' }}</span>
                        </div>
                    </div>
    
                    <div class="flex flex-col justify-between items-end px-3 py-1 gap-1">
                        @if ($requestMitra->kerjasama)
                            <a href="{{ route('customer.kerjasama.edit', $requestMitra->kerjasama->id) }}" class="inline-block w-fit h-fit poppins-semibold bg-teal-500 text-slate-100 text-center px-3 py-1 transition delay-50 duration-300 hover:bg-teal-700">
                                Edit
                            </a>
                        @else
                            <span class="poppins-medium text-slate-700">{{ $requestMitra->status_request }}</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout-home>