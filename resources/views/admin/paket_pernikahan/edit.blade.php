<x-layout>
    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.paket_pernikahan.update', $paketPernikahan) }}">
            @method('PUT')

            <x-form.container variant="form">
                <div>
                    <x-form.label for="nama_paket">Nama paket</x-form.label>
                    <x-form.input type="text" name="nama_paket" id="nama_paket" :value="old('nama_paket', $paketPernikahan->nama_paket)" placeholder="Nama paket..." required />
                    <x-form.error errorFor="nama_paket" />
                </div>

                <!-- Loop -->
                 @foreach ($jenisUsahasSlugged as $inputName => $label)
                    <x-form.label for="{{ $label }}">{{ ucfirst($label) }}</x-form.label>
                    <x-form.select name="{{ $inputName }}" id="{{ $inputName }}">
                        <option value="">Pilih Usaha</option>
                        <option value="">Kosongkan</option>
                        @foreach ($kerjasamaByJenis[$label] as $kerjasama)
                            <option value="{{ $kerjasama->id }}" {{ (string) old($inputName, $paketPernikahan->$inputName) === (string) $kerjasama->id ? 'selected' : '' }}>
                                {{ $kerjasama->requestMitra->nama_usaha }}
                            </option>
                        @endforeach
                    </x-form.select>
                @endforeach

                <div>
                    <x-form.label for="staff_acara">Staff acara</x-form.label>
                    <x-form.input type="number" name="staff_acara" id="staff_acara" :value="old('staff_acara', $paketPernikahan->staff_acara)" placeholder="Staff acara..." />
                    <x-form.error errorFor="staff_acara" />
                </div>

                <div>
                    <x-form.label for="hargaDP_paket">Harga DP Rp.</x-form.label>
                    <x-form.input type="text" name="hargaDP_paket" id="hargaDP_paket" :value="old('hargaDP_paket', number_format($paketPernikahan->hargaDP_paket, 0, ',', '.'))" placeholder="999.999.999" required />
                    <x-form.error errorFor="hargaDP_paket" />
                </div>

                <div>
                    <x-form.label for="hargaLunas_paket">Harga lunas Rp.</x-form.label>
                    <x-form.input type="text" name="hargaLunas_paket" id="hargaLunas_paket" :value="old('hargaLunas_paket', number_format($paketPernikahan->hargaLunas_paket, 0, ',', '.'))" placeholder="999.999.999" required />
                    <x-form.error errorFor="hargaLunas_paket" />
                </div>

                <div>
                    <x-form.label for="status_paket">Status paket pernikahan</x-form.label>
                    <x-form.select name="status_paket" id="status_paket">
                        <option value="Tersedia"        {{ old('status_paket', $paketPernikahan->status_paket) === 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="Tidak tersedia"  {{ old('status_paket', $paketPernikahan->status_paket) === 'Tidak tersedia' ? 'selected' : '' }}>Tidak tersedia</option>
                        <option value="Eksklusif"       {{ old('status_paket', $paketPernikahan->status_paket) === 'Eksklusif' ? 'selected' : '' }}>Eksklusif</option>
                    </x-form.select>
                    <x-form.error errorFor="status_paket" />
                </div>

                <div>
                    <x-form.label for="user">User</x-form.label>
                    <x-form.select name="user_id" id="user_id">
                        <option value="">Pilih User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ (string) old('user_id', $paketPernikahan->user_id) === (string) $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </x-form.select>
                    <x-form.error errorFor="user_id" />
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
</x-layout>