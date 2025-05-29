<x-layout-home>
    <div class="h-270 flex flex-col items-center p-5 gap-4 shadow shadow-slate-500">
        <span class="poppins-semibold text-teal-700 text-3xl text-center">
            Ulasan
        </span>

        <div class="w-full grid grid-cols-4 gap-4 px-8 overflow-auto">
            @foreach ($ulasans as $ulasan)
                <div class="w-full bg-teal-700 flex flex-col shadow shadow-slate-500">
                    @php
                        $imagePath = asset('storage/' . $ulasan->upload_file);
                    @endphp
                    
                    <div class="h-56 bg-cover bg-center py-2" style="background-image: url('{{ $imagePath }}')">
                        <div class="bg-teal-700 w-fit flex items-center px-3 py-1 gap-3 rounded-r-full">
                            <img src="{{ $ulasan->user->profile_pic ? asset('storage/' . $ulasan->user->profile_pic) : '' }}" alt="Profile picture"
                                class="w-7 h-7 bg-cover bg-center rounded-full">
    
                            <span class="poppins-medium text-slate-100 line-clamp-1">{{ $ulasan->user->name }}</span>
                        </div>
                    </div>

                    <span class="poppins text-slate-100 text-sm text-justify px-3 py-1 line-clamp-3">
                        <span class="px-3"></span>{{ $ulasan->ulasan }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
</x-layout-home>