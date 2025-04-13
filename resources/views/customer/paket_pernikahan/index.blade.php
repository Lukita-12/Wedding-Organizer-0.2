<x-layout>

    <x-nav-bar />

    <x-jumbotron />

    <!-- Container -->
    <div class="border border-dashed border-gray-700 h-120">

        <!-- Header -->
        <div class="border border-dashed border-gray-700
            py-1 flex justify-between items-center">
            <div class="flex gap-3 items-center">
                <span class="bg-gray-700 w-3 h-3 rounded-full"></span>
                <h2 class="text-gray-700 poppins-semibold text-3xl">Paket Pernikahan</h2>
            </div>
            <a href="#" class="underline inter-italic">Lebih banyak...</a>
        </div>
    
        <!-- Card container -->
        <div class="border border-dashed border-gray-700
            flex flex-row justify-center space-x-4 mt-4">

            <!-- Card -->
            @foreach ($paketPernikahans as $paketPernikahan)
                @can ('view', $paketPernikahan)
                <a href="{{ route('customer.pesanan.create', ['paket-pernikahan' => $paketPernikahan->id]) }}" class="block">
                    <div class="border border-dashed border-gray-700 w-105 rounded-xl">
                        <img src="{{ asset('../public/images/flower-red-night.jpg') }}" alt="Thumbnail" class="w-full h-56 object-cover rounded-t-xl">
                        
                        <div class="flex flex-col px-3 py-1 gap-2">
                            <h3 class="text-gray-700 poppins-semibold text-2xl">{{ $paketPernikahan->nama_paket }}</h3>
                            <div class="flex justify-end gap-2">
                                <a href="#" class="bg-gray-300 px-3 py-1 inter text-sm rounded-sm">Tag</a>
                                <a href="#" class="bg-gray-300 px-3 py-1 inter text-sm rounded-sm">Tag</a>
                            </div>
                            <p class="inter-medium text-lg text-end">Rp. {{ number_format($paketPernikahan->hargaLunas_paket, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </a>
                @endcan
            @endforeach

        </div>

    </div>

    <div>
        @foreach ($paketPernikahans as $paketPernikahan)
            @can ('view', $paketPernikahan)
                <div class="card">
                    <h2>{{ $paketPernikahan->nama_paket }}</h2>
                    <p>Harga: Rp{{ number_format($paketPernikahan->hargaLunas_paket, 0, ',', '.') }}</p>
                    <p>Status: {{ $paketPernikahan->status_paket }}</p>
                    <a href="{{ route('customer.pesanan.create', ['paket-pernikahan' => $paketPernikahan->id]) }}">
                        Pesan Sekarang
                    </a>
                </div>
            @endcan
        @endforeach
    </div>

</x-layout>