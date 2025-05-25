<x-layout-home>
    <div class="h-270 grid grid-cols-3 gap-4 p-4 overflow-y-auto">
        @foreach ($ulasans as $ulasan)
            <div class="h-fit bg-slate-200 felx flex-col px-1 py-1 shadow-md shadow-700">
                @php
                    $imagePath = asset('storage/' . $ulasan->upload_file);
                @endphp
                <div class="w-full h-56 bg-cover bg-center px-2 py-2" style="background-image: url('{{ $imagePath }}')">
                    <div class="w-fit backdrop-blur-lg flex items-center px-1 py-1 gap-2 rounded-l-full">
                        <span class="w-7 h-7 bg-[url('/public/images/landscape-panoramic.jpg')] bg-cover bg-center rounded-full"></span>
                        <span class="poppins-medium text-slate-700">{{ $ulasan->user->name }}</span>
                    </div>
                </div>
                <div>
                    <span class="poppins text-slate-700 text-sm text-justify px-3 py-1 line-clamp-3 leading-relaxed"><span class="px-3"></span>{{ $ulasan->ulasan }}</span>
                </div>
            </div>
        @endforeach
    </div>
</x-layout-home>