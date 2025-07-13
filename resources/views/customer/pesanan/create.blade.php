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
                                        data-ket_venue="{{ $paketPernikahan->ket_venue }}"
                                        data-ket_dekorasi="{{ $paketPernikahan->ket_dekorasi }}"
                                        data-ket_tata_rias="{{ $paketPernikahan->ket_tata_rias }}"
                                        data-ket_catering="{{ $paketPernikahan->ket_catering }}"
                                        data-ket_kue_pernikahan="{{ $paketPernikahan->ket_kue_pernikahan }}"
                                        data-ket_fotografer="{{ $paketPernikahan->ket_fotografer }}"
                                        data-ket_entertainment="{{ $paketPernikahan->ket_entertainment }}"
                                        {{ (string) old('paket_pernikahan_id', $selectedPaketId) === (string) $paketPernikahan->id ? 'selected' : '' }}>
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
                            <p id="ket_venue">-</p>
                            <p id="ket_dekorasi">-</p>
                            <p id="ket_tata_rias">-</p>
                            <p id="ket_catering">-</p>
                            <p id="ket_kue_pernikahan">-</p>
                            <p id="ket_fotografer">-</p>
                            <p id="ket_entertainment">-</p>
                        </div>

                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('customer.paket_pernikahan.index') }}" class="inline-block poppins-medium text-teal-700 underline hover:text-teal-500">Lihat Paket ></a>
                    </div>
    
                    <div class="grid grid-cols-2 gap-4">
        
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
    
                    <x-form.container variant="button">
                        <x-form.link href="{{ route('home') }}">Batal</x-form.link>
                        <x-form.button type="submit">Simpan</x-form.button>
                    </x-form.container>
                </x-form.container>
            </fieldset>
        </x-form.form>
    </x-form.container>

    <script>
    // Data Pelanggan
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
        
        // Paket pernikahan
        const selectPaket = document.getElementById('paket_pernikahan_id');
        selectPaket.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            document.getElementById('ket_venue').innerText = selectedOption.getAttribute('data-ket_venue') || '-';
            document.getElementById('ket_dekorasi').innerText = selectedOption.getAttribute('data-ket_dekorasi') || '-';
            document.getElementById('ket_tata_rias').innerText = selectedOption.getAttribute('data-ket_tata_rias') || '-';
            document.getElementById('ket_catering').innerText = selectedOption.getAttribute('data-ket_catering') || '-';
            document.getElementById('ket_kue_pernikahan').innerText = selectedOption.getAttribute('data-ket_kue_pernikahan') || '-';
            document.getElementById('ket_fotografer').innerText = selectedOption.getAttribute('data-ket_fotografer') || '-';
            document.getElementById('ket_entertainment').innerText = selectedOption.getAttribute('data-ket_entertainment') || '-';
        });

        // Auto-trigger saat halaman dimuat
        if (selectPaket.value) {
            selectPaket.dispatchEvent(new Event('change'));
        }
    </script>


</x-layout-form>