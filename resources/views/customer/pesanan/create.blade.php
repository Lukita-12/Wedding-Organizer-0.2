<x-layout>

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
                        <x-form.select name="pelanggan_id" id="pelanggan_id" required>
                            <option value="">Pilih pelanggan</option>
                            @foreach ($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id }}"
                                    {{ (string) old('pelanggan_id') === (string) $pelanggan->id ? 'selected' : '' }}>
                                    {{ $pelanggan->nama_pelanggan }}
                                </option>
                            @endforeach
                        </x-form.select>
                        <x-form.error errorFor="pelanggan_id" />
                    </div>
    
                    <div>
                        <x-form.label for="paket_pernikahan">Paket Pernikahan</x-form.label>
                        <x-form.select name="paket_pernikahan_id" id="paket_pernikahan_id">
                            <option value="">Pilih paket pernikahan</option>
                            <option value="">Tanpa paket pernikahan</option>
                            @foreach ($paketPernikahans as $paketPernikahan)
                                <option value="{{ $paketPernikahan->id }}"
                                    data-harga="{{ $paketPernikahan->hargaLunas_paket }}"
                                    {{ (string) old('paket_pernikahan_id', $paket_id) === (string) $paketPernikahan->id ? 'selected' : '' }}>
                                    {{ $paketPernikahan->nama_paket }}
                                </option>
                            @endforeach
                        </x-form.select>
                        <x-form.error errorFor="paket_pernikahan_id" />
                    </div>
    
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
    
                    <div>
                        <x-form.label for="total_harga">Total Harga</x-form.label>
                        <x-form.input type="text" name="total_harga_pesanan" id="total_harga_pesanan" value="{{ number_format(old('harga_lunas_paket', 0), 0, ',', '.') }}" placeholder="000.000.000" disabled />
                        <x-form.error errorFor="total_harga_pesanan" />
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

</x-layout>