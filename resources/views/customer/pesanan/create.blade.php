<x-layout-form>
    <x-slot:heading>
        PESANAN
    </x-slot:heading>

    <x-form.container variant="main">
        @unless ($hasPelanggan)
            <div class="flex flex-col items-center gap-4">
                <span class="w-md poppins-medium text-slate-700 text-center text-xl">Informasi pelanggan diperlukan sebelum membuat pesanan!</span>
                <span class="my-1"></span>
                <a href="{{ route('customer.pelanggan.create') }}" class="w-2xs poppins-semibold bg-teal-500 text-slate-100 text-center text-lg px-3 py-1 transition delay-50 duration-300 hover:bg-teal-700">
                    + Buat
                </a>
                <span class="w-full border-2 border-slate-700 border-dashed"></span>
            </div>
        @endunless

        <x-form.form action="{{ route('customer.pesanan.store') }}">
            <fieldset {{ !$hasPelanggan ? 'disabled' : '' }} class="{{ !$hasPelanggan ? 'opacity-50' : '' }} py-4">
                <x-form.container variant="form">
                    <div>
                        <x-form.label for="pelanggan_id">Pelanggan</x-form.label>
                        <div class="flex gap-3">
                            <div class="w-full">
                                <x-form.select name="pelanggan_id" id="pelanggan_id" required>
                                    <option value="">Pilih pelanggan</option>
                                    @foreach ($pelanggans as $pelanggan)
                                        <option value="{{ $pelanggan->id }}"
                                            data-jk="{{ $pelanggan->jk_pelanggan }}"
                                            data-telp="{{ $pelanggan->noTelp_pelanggan }}"
                                            data-email="{{ $pelanggan->email_pelanggan }}"
                                            data-alamat="{{ $pelanggan->alamat_pelanggan }}"
                                            {{ (string) old('pelanggan_id') === (string) $pelanggan->id ? 'selected' : '' }}>
                                            {{ $pelanggan->nama_pelanggan }}
                                        </option>
                                    @endforeach
                                </x-form.select>
                            </div>

                            <div class="min-w-fit">
                                <a href="{{ route('customer.pelanggan.create') }}" class="inline-block poppins-medium text-lg bg-teal-500 text-slate-100 px-3 py-1 rounded-sm hover:bg-teal-700">+ Baru</a>
                            </div>
                        </div>
                        <x-form.error errorFor="pelanggan_id" />
                    </div>

                    <!-- Auto-fill fields -->
                    <div class="poppins bg-slate-300 grid grid-cols-2 p-3 text-slate-500 rounded-sm">
                        <div class="w-fit font-medium flex flex-col gap-1">
                            <p>Nama Lengkap :</p>
                            <p>Jenis Kelamin :</p>
                            <p>No. Telpon/WA :</p>
                            <p>Email :</p>
                            <p>Alamat :</p>
                        </div>
                        <div class="text-end flex flex-col gap-1">
                            <p><span id="nama_lengkap">-</span></p>
                            <p><span id="jenis_kelamin">-</span></p>
                            <p><span id="no_telpon">-</span></p>
                            <p><span id="email">-</span></p>
                            <p><span id="alamat">-</span></p>
                        </div>
                    </div>

    
                    <!-- Paket Pernikahan -->
                    <div>
                        <x-form.label for="paket_pernikahan">Paket Pernikahan</x-form.label>
                        <x-form.select name="paket_pernikahan_id" id="paket_pernikahan_id">
                            <option value="">Tanpa paket yang dipilih</option>
                            @foreach ($paketPernikahans as $paketPernikahan)
                                <option value="{{ $paketPernikahan->id }}"
                                    data-venue="{{ $paketPernikahan->venueUsaha?->{"ket_" . $paketPernikahan->venue_ket_harga} ?? '-' }}"
                                    data-dekorasi="{{ $paketPernikahan->dekorasiUsaha?->{"ket_" . $paketPernikahan->dekorasi_ket_harga} ?? '-' }}"
                                    data-tata_rias="{{ $paketPernikahan->tataRiasUsaha?->{"ket_" . $paketPernikahan->tata_rias_ket_harga} ?? '-' }}"
                                    data-catering="{{ $paketPernikahan->cateringUsaha?->{"ket_" . $paketPernikahan->catering_ket_harga} ?? '-' }}"
                                    data-kue_pernikahan="{{ $paketPernikahan->kuePernikahanUsaha?->{"ket_" . $paketPernikahan->kue_pernikahan_ket_harga} ?? '-' }}"
                                    data-fotografer="{{ $paketPernikahan->fotograferUsaha?->{"ket_" . $paketPernikahan->fotografer_ket_harga} ?? '-' }}"
                                    data-entertainment="{{ $paketPernikahan->entertainmentUsaha?->{"ket_" . $paketPernikahan->entertainment_ket_harga} ?? '-' }}"
                                    {{ (string) old('paket_pernikahan_id', $paket_id) === (string) $paketPernikahan->id ? 'selected' : '' }}>
                                    {{ $paketPernikahan->nama_paket }}
                                </option>
                            @endforeach
                        </x-form.select>
                        <x-form.error errorFor="paket_pernikahan_id" />
                    </div>

                    <div class="poppins bg-slate-300 grid grid-cols-2 p-3 text-slate-500 rounded-sm">
                        <div class="w-fit font-medium flex flex-col gap-1">
                            <p>Venue :</p>
                            <p>Dekorasi :</p>
                            <p>Tata rias :</p>
                            <p>Catering :</p>
                            <p>Kue Pernikahan :</p>
                            <p>Foto :</p>
                            <p>Entertainment :</p>
                        </div>
                        <div class="text-end flex flex-col gap-1">
                            <p id="ket-venue">-</p>
                            <p id="ket-dekorasi">-</p>
                            <p id="ket-tata_rias">-</p>
                            <p id="ket-catering">-</p>
                            <p id="ket-kue_pernikahan">-</p>
                            <p id="ket-fotografer">-</p>
                            <p id="ket-entertainment">-</p>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('customer.paket_pernikahan.index') }}" class="inline-block poppins-medium text-teal-700 underline hover:text-teal-500">Lihat Paket ></a>
                    </div>
    
                    <div class="grid grid-cols-2 gap-4">
                        <?php
                        /*
                        <div>
                            <x-form.label for="pengantin_pria">Pengantin Pria</x-form.label>
                            <x-form.input type="text" name="pengantin_pria" id="pengantin_pria" :value="old('pengantin_pria')" placeholder="Nama pengantin pria..." required />
                            <x-form.error errorFor="pengantin_pria" />
                        </div>
        
                        <div>
                            <x-form.label for="pengantin_wanita">Pengantin Wanita</x-form.label>
                            <x-form.input type="text" name="pengantin_wanita" id="pengantin_wanita" :value="old('pengantin_wanita')" placeholder="Nama pengantin wanita..." />
                            <x-form.error errorFor="pengantin_wanita" />
                        </div>
                        */
                        ?>
        
                        <div>
                            <x-form.label for="tanggal_diskusi">Tanggal Diskusi/Perencaan</x-form.label>
                            <x-form.input type="date" name="tanggal_diskusi" id="tanggal_diskusi" :value="old('tanggal_diskusi')" required />
                            <x-form.error errorFor="tanggal_diskusi" />
                        </div>
        
                        <div>
                            <x-form.label for="tanggal_acara">Tanggal Acara</x-form.label>
                            <x-form.input type="date" name="tanggal_acara" id="tanggal_acara" :value="old('tanggal_acara')" required />
                            <x-form.error errorFor="tanggal_acara" />
                        </div>
                    </div>
    
                    <!-- Total harga -->
                    <?php
                    /*
                    <div>
                        <x-form.label for="total_harga">Total Harga</x-form.label>
                        <x-form.input type="text" name="total_harga_pesanan" id="total_harga_pesanan" value="{{ number_format(old('harga_lunas_paket', 0), 0, ',', '.') }}" placeholder="000.000.000" disabled />
                        <x-form.error errorFor="total_harga_pesanan" />
                    </div>
                    */
                    ?>
    
                    <x-form.container variant="button">
                        <x-form.link href="{{ route('home') }}">Batal</x-form.link>
                        <x-form.button type="submit">Simpan</x-form.button>
                    </x-form.container>
                </x-form.container>
            </fieldset>
        </x-form.form>
    </x-form.container>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const paketSelect = document.getElementById('paket_pernikahan_id');
            const hargaInput = document.getElementById('total_harga_pesanan');

            function formatRupiah(angka) {
                return new Intl.NumberFormat('id-ID').format(angka);
            }

            function updateHarga() {
                const selectedOption = paketSelect.options[paketSelect.selectedIndex];
                const harga = selectedOption.getAttribute('data-harga');
                hargaInput.value = harga ? formatRupiah(harga) : '';
            }

            // Jalankan saat pertama kali halaman dimuat
            updateHarga();

            // Jalankan ketika user memilih paket
            paketSelect.addEventListener('change', updateHarga);
        });
    </script>

    <!-- Data Pelanggan -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const pelangganSelect = document.getElementById('pelanggan_id');

            // Target untuk menampilkan data
            const namaSpan = document.getElementById('nama_lengkap');
            const jkSpan = document.getElementById('jenis_kelamin');
            const telpSpan = document.getElementById('no_telpon');
            const emailSpan = document.getElementById('email');
            const alamatSpan = document.getElementById('alamat');

            function updateGrid() {
                const selected = pelangganSelect.options[pelangganSelect.selectedIndex];

                // Ambil data dari option attributes
                namaSpan.textContent = selected.text || '-';
                jkSpan.textContent = selected.getAttribute('data-jk') || '-';
                telpSpan.textContent = selected.getAttribute('data-telp') || '-';
                emailSpan.textContent = selected.getAttribute('data-email') || '-';
                alamatSpan.textContent = selected.getAttribute('data-alamat') || '-';
            }

            // Jalankan saat halaman dimuat jika ada pelanggan terpilih
            updateGrid();

            // Jalankan saat user mengganti pilihan pelanggan
            pelangganSelect.addEventListener('change', updateGrid);
        });
    </script>

    <!-- Paket pernikahan -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectPaket = document.getElementById('paket_pernikahan_id');

            function updateKeterangan() {
                const selected = selectPaket.options[selectPaket.selectedIndex];

                document.getElementById('ket-venue').innerText = selected.dataset.venue || '-';
                document.getElementById('ket-dekorasi').innerText = selected.dataset.dekorasi || '-';
                document.getElementById('ket-tata_rias').innerText = selected.dataset.tata_rias || '-';
                document.getElementById('ket-catering').innerText = selected.dataset.catering || '-';
                document.getElementById('ket-kue_pernikahan').innerText = selected.dataset.kue_pernikahan || '-';
                document.getElementById('ket-fotografer').innerText = selected.dataset.fotografer || '-';
                document.getElementById('ket-entertainment').innerText = selected.dataset.entertainment || '-';
            }

            // Update saat halaman pertama kali dibuka (jika ada paket terpilih)
            updateKeterangan();

            // Update saat user ganti pilihan
            selectPaket.addEventListener('change', updateKeterangan);
        });
    </script>

</x-layout-form>