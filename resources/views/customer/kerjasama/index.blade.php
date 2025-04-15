<x-layout>

    <x-nav-bar />

    <x-jumbotron />

    <div class="border border-dashed border-gray-700 h-120">
        <div class="flex h-full">
            <div class="w-1/2 bg-[url('/public/images/grass-snow.jpg')] bg-cover bg-center"></div>
            <div class="w-1/2 flex flex-col justify-center items-center space-y-4">
                <h1 class="border border-dashed border-gray-700
                    w-140 poppins-semibold text-4xl text-slate-700 text-center">
                    BUAT KERJASAMA DENGAN HATMA WEDDING ORGANIZER
                </h1>
                <a href="{{ route('customer.request_mitra.create') }}"
                class="border-sketch text-gray-sketch px-4 py-1 poppins-bold text-xl rounded-md">DAFTAR</a>
            </div>
        </div>
    </div>

    <x-content-container>
        <div class="border border-dashed border-gray-700 mb-4
            flex gap-3 justify-center items-center px-4 py-2">
            <h2 class="text-gray-700 poppins-semibold text-3xl text-center">Kerjasama</h2>
        </div>

        @if($kerjasamas->isEmpty())
            <p>No partner data available yet.</p>
        @else    
            @foreach ($kerjasamas as $kerjasama)
                <div class="flex justify-center gap-8">
                    <div class="border border-dashed border-gray-700 w-1/2 flex flex-col space-y-4">
                        <h1 class="text-gray-900 poppins-semibold text-2xl">Pemilik usaha: 
                            <span class="text-gray-700 inter">{{ $kerjasama->nama_pemilik }}</span>
                        </h1>
    
                        <h1 class="text-gray-900 poppins-semibold text-2xl">Nama usaha: 
                            <span class="text-gray-700 inter">{{ $kerjasama->nama_usaha }}</span>
                        </h1>
    
                        <h1 class="text-gray-900 poppins-semibold text-2xl">Jenis usaha: 
                            <span class="text-gray-700 inter">{{ $kerjasama->jenis_usaha }}</span>
                        </h1>
    
                        <h1 class="text-gray-900 poppins-semibold text-2xl">No. Telpon/WA usaha: 
                            <span class="text-gray-700 inter">{{ $kerjasama->noTelp_usaha }}</span>
                        </h1>
    
                        <h1 class="text-gray-900 poppins-semibold text-2xl">Email usaha: 
                            <span class="text-gray-700 inter">{{ $kerjasama->email_usaha }}</span>
                        </h1>
    
                        <h1 class="text-gray-900 poppins-semibold text-2xl">Alamat usaha: 
                            <span class="text-gray-700 inter">{{ $kerjasama->alamat_usaha }}</span>
                        </h1>
                    </div>

                    <div class="border border-dashed border-gray-700 w-1/2 flex flex-col space-y-4">
                        <h1 class="text-gray-900 poppins-semibold text-2xl">Harga 01: 
                            <span class="text-gray-700 inter">{{ $kerjasama->harga01 }}</span>
                        </h1>
    
                        <h1 class="text-gray-900 poppins-semibold text-2xl">Keterangan harga 01: 
                            <span class="text-gray-700 inter">{{ $kerjasama->ket_harga01 }}</span>
                        </h1>
    
                        <h1 class="text-gray-900 poppins-semibold text-2xl">Harga 02: 
                            <span class="text-gray-700 inter">{{ $kerjasama->harga02 }}</span>
                        </h1>
    
                        <h1 class="text-gray-900 poppins-semibold text-2xl">Keterangan harga 02: 
                            <span class="text-gray-700 inter">{{ $kerjasama->ket_harga02 }}</span>
                        </h1>
                    </div>

                </div>
                <div class="flex justify-end">
                    <a href="{{ route('customer.kerjasama.show', $kerjasama->id) }}" 
                        class="border-sketch text-gray-sketch
                            px-4 py-1 poppins-semibold text-xl rounded-lg">
                        Edit
                    </a>
                </div>
            @endforeach
        @endif
    </x-content-cantainer>

</x-layout>