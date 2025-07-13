<x-layout>
    <div class="flex flex-col items-center py-8">
        <span class="poppins-semibold text-teal-500 text-5xl text-center">PAKET PERNIKAHAN</span>
    </div>

    <div class="flex flex-col items-center py-6">

        <div class="w-2/3 bg-slate-200 grid grid-cols-3 gap-4 p-4 rounded-lg shadow-lg">
            <!-- Gambar Thumbnail -->
            <div class="col-span-3">
                <img src="{{ $paketPernikahan->upload_file ? asset('storage/' . $paketPernikahan->upload_file) : asset('images/winter.jpg') }}"
                    alt="thumbnail"
                    class="w-full h-72 object-cover rounded-lg shadow">
            </div>

            <!-- Detail Paket -->
            <div class="col-span-3">
                <div class="flex justify-between items-center">
                    <h1 class="text-3xl font-semibold text-teal-700 mb-2">{{ $paketPernikahan->nama_paket }}</h1>
                    <p class="text-slate-600 mb-4">Status: 
                        <span class="poppins-medium px-2 py-1 bg-slate-300 text-teal-700 rounded">
                            {{ ucfirst($paketPernikahan->status_paket) }}
                        </span>
                    </p>
                </div>
            </div>

            <!-- List Vendor --> 
            @php
            $vendors = [
                [
                    'label' => 'Venue',
                    'usaha' => $paketPernikahan->venueUsaha,
                    'hargaKey' => $paketPernikahan->venue_ket_harga,
                ],
                [
                    'label' => 'Dekorasi',
                    'usaha' => $paketPernikahan->dekorasiUsaha,
                    'hargaKey' => $paketPernikahan->dekorasi_ket_harga,
                ],
                [
                    'label' => 'Tata Rias',
                    'usaha' => $paketPernikahan->tataRiasUsaha,
                    'hargaKey' => $paketPernikahan->tata_rias_ket_harga,
                ],
                [
                    'label' => 'Catering',
                    'usaha' => $paketPernikahan->cateringUsaha,
                    'hargaKey' => $paketPernikahan->catering_ket_harga,
                ],
                [
                    'label' => 'Kue Pernikahan',
                    'usaha' => $paketPernikahan->kuePernikahanUsaha,
                    'hargaKey' => $paketPernikahan->kue_pernikahan_ket_harga,
                ],
                [
                    'label' => 'Fotografer',
                    'usaha' => $paketPernikahan->fotograferUsaha,
                    'hargaKey' => $paketPernikahan->fotografer_ket_harga,
                ],
                [
                    'label' => 'Entertainment',
                    'usaha' => $paketPernikahan->entertainmentUsaha,
                    'hargaKey' => $paketPernikahan->entertainment_ket_harga,
                ],
            ];
            @endphp

            @foreach ($vendors as $vendor)
                @if ($vendor['usaha'])
                    <div class="bg-slate-100 rounded shadow">
                        <!-- Swiper Container -->
                        <div class="swiper rounded-t-sm">
                            <div class="swiper-wrapper">
                                @php
                                    $gambarPromosi = $vendor['usaha']->gambarPromosi;
                                @endphp

                                @if ($gambarPromosi && $gambarPromosi->count() > 0)
                                    @foreach ($gambarPromosi as $gambar)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/' . $gambar->file_path) }}" 
                                                alt="Gambar {{ $vendor['label'] }}" 
                                                class="w-full h-48 object-cover">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="swiper-slide">
                                        <img src="{{ asset('images/winter.jpg') }}" 
                                            alt="Default {{ $vendor['label'] }}" 
                                            class="w-full h-48 object-cover">
                                    </div>
                                @endif
                            </div>
                            <!-- Swiper Controls -->
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>

                        <div class="px-3 py-1">
                            <h2 class="poppins-semibold text-xl text-teal-500 mb-1">{{ $vendor['label'] }}</h2>
                            <br>
                            <p class="poppins-medium text-sm text-end text-slate-700">
                                @if($vendor['hargaKey'])
                                    {{ $vendor['hargaKey'] === 'harga01' 
                                        ? $vendor['usaha']->ket_harga01 
                                        : $vendor['usaha']->ket_harga02 }}
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                    </div>
                @endif
            @endforeach

            <!-- Harga -->
            <?php
            /*
            <div class="col-span-2 bg-slate-100 p-4 rounded shadow">
                <h2 class="font-semibold text-xl text-slate-800">Harga Paket</h2>
                <p class="text-slate-700 mt-2">DP: Rp{{ number_format($paketPernikahan->hargaDP_paket, 0, ',', '.') }}</p>
                <p class="text-slate-700">Pelunasan: Rp{{ number_format($paketPernikahan->hargaLunas_paket, 0, ',', '.') }}</p>
            </div>
            */
            ?>

            <div class="col-span-3 flex justify-end gap-3">
                <!-- Tombol Kembali -->
                <a href="{{ route('customer.paket_pernikahan.index') }}"
                class="w-1/5 poppins-medium px-3 py-1 bg-red-500 text-slate-100 text-lg text-center rounded-sm hover:bg-red-700">
                    Kembali
                </a>

                <!-- Tombol Pesan -->
                <a href="{{ route('customer.pesanan.create', ['paket_id' => $paketPernikahan->id]) }}"
                target="_blank"
                class="w-1/5 poppins-medium px-3 py-1 bg-teal-500 text-slate-100 text-lg text-center rounded-sm hover:bg-teal-700">
                    Pesan
                </a>
            </div>
        </div>

    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.swiper', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
        });
    });
    </script>
</x-layout>