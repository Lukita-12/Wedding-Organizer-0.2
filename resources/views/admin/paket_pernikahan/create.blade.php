<x-layout-form>
    <x-slot:heading>
        PAKET PERNIKAHAN
    </x-slot:heading>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.paket_pernikahan.store') }}">
            <x-form.container variant="form">
                <div>
                    <x-form.label for="nama_paket">Nama paket</x-form.label>
                    <x-form.input type="text" name="nama_paket" id="nama_paket" :value="old('nama_paket')" placeholder="Nama paket..." required />
                    <x-form.error errorFor="nama_paket" />
                </div>

                @foreach ($kerjasamasByJenis as $jenis => $kerjasamas)
                    <div>
                        <x-form.label for="{{ $jenis }}">{{ ucfirst(str_replace('_', ' ', $jenis)) }}</x-form.label>
                        <x-form.select name="{{ $jenis }}" id="{{ $jenis }}">
                            <option value="">Pilih {{ ucfirst(str_replace('_', ' ', $jenis)) }}</option>
                            @foreach ($kerjasamas as $kerjasama)
                                <option value="{{ $kerjasama->id }}"
                                    data-ket-harga01="{{ $kerjasama->ket_harga01 }}"
                                    data-ket-harga02="{{ $kerjasama->ket_harga02 }}">
                                    {{ $kerjasama->requestMitra->nama_usaha }}
                                </option>
                            @endforeach
                        </x-form.select>
                    </div>

                    <div>
                        <x-form.label for="{{ $jenis }}_ket_harga">Pilih Keterangan Harga</x-form.label>
                        <x-form.select name="{{ $jenis }}_ket_harga" id="{{ $jenis }}_ket_harga">
                            <option value="">Pilih Keterangan Harga</option>
                        </x-form.select>
                    </div>
                @endforeach

                <div>
                    <x-form.label for="status_paket">Status Paket</x-form.label>
                    <x-form.select name="status_paket" id="status_paket">
                        <option value="Tersedia">Tersedia</option>
                        <option value="Tidak tersedia">Tidak Tersedia</option>
                        <option value="Eksklusif">Eksklusif</option>
                    </x-form.select>
                </div>

                <div>
                    <x-form.label for="user_id">User (Jika Eksklusif)</x-form.label>
                    <x-form.select name="user_id" id="user_id">
                        <option value="">Pilih User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </x-form.select>
                </div>

                <x-form.container variant="button">
                    <x-form.link href="{{ route('admin.paket_pernikahan.index') }}">Batal</x-form.button-link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.container>
            </x-form.container>
        </x-form.form>
    </x-form.container>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const jenisList = ['venue', 'dekorasi', 'tata_rias', 'catering', 'kue_pernikahan', 'fotografer', 'entertainment'];

            jenisList.forEach(function(jenis) {
                const selectKerjasama = document.getElementById(jenis);
                const selectKetHarga = document.getElementById(jenis + '_ket_harga');

                function updateKetHargaOptions() {
                    const selectedOption = selectKerjasama.options[selectKerjasama.selectedIndex];
                    const ketHarga01 = selectedOption.getAttribute('data-ket-harga01');
                    const ketHarga02 = selectedOption.getAttribute('data-ket-harga02');

                    // Reset opsi keterangan harga
                    selectKetHarga.innerHTML = '<option value="">Pilih Keterangan Harga</option>';

                    // Tambahkan opsi hanya jika ada data
                    if (ketHarga01) {
                        selectKetHarga.innerHTML += `<option value="harga01">${ketHarga01}</option>`;
                    }
                    if (ketHarga02) {
                        selectKetHarga.innerHTML += `<option value="harga02">${ketHarga02}</option>`;
                    }
                }

                // Update saat pilihan kerjasama berubah
                selectKerjasama.addEventListener('change', updateKetHargaOptions);

                // Jalankan sekali untuk inisialisasi jika ada old value
                updateKetHargaOptions();
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const statusSelect = document.getElementById('status_paket');
            const userSelect = document.getElementById('user_id');

            function toggleUserSelect() {
                if (statusSelect.value === 'Eksklusif') {
                    userSelect.disabled = false;
                } else {
                    userSelect.disabled = true;
                    userSelect.value = ""; // kosongkan jika bukan eksklusif
                }
            }

            // Panggil saat halaman dimuat
            toggleUserSelect();

            // Panggil saat status dipilih ulang
            statusSelect.addEventListener('change', toggleUserSelect);
        });
    </script>
</x-layout-form>