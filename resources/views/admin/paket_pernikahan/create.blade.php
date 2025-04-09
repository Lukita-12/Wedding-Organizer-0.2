<x-layout>

    <div>
        <x-form.form-layout action="{{ route('admin.paket_pernikahan.store') }}">

            <div>
                <x-form.form-label for="nama_paket">
                    Nama paket
                </x-form.form-label>
                <x-form.form-input type="text"
                    name="nama_paket" id="nama_paket"
                    :value="old('nama_paket')"
                    placeholder="Nama paket..."
                    required />
                <x-form.form-error errorFor="nama_paket" />
            </div>

            @php
                $jenisUsahas = ['venue', 'dekorasi', 'tata_rias', 'catering', 'kue_pernikahan', 'fotografer', 'entertaiment'];
            @endphp

            @foreach ($jenisUsahas as $jenisUsaha)
                @php
                    // Ubah 'tata_rias' menjadi 'Tata rias'
                    $jenisLabel = ucfirst(str_replace('_', ' ', $jenisUsaha));
                @endphp
                <div>
                    <x-form.form-label for="{{ $jenisUsaha }}">
                        {{ $jenisLabel }}
                    </x-form.form-label>
                    <x-form.form-select name="{{ $jenisUsaha }}">
                        <option value="">Pilih</option>
                        <option value="">--Kosongkan--</option>
                        @foreach ($kerjasamas->where('jenis_usaha', $jenisLabel) as $kerjasama)
                            <option value="{{ $kerjasama->id }}">{{ $kerjasama->nama_usaha }}</option>
                        @endforeach
                    </x-form.form-select>
                </div>
            @endforeach

            <div>
                <x-form.form-label for="staff_acara">
                    Staff acara
                </x-form.form-label>
                <x-form.form-input type="number"
                    name="staff_acara" id="staff_acara"
                    :value="old('staff_acara')"
                    placeholder="Staff acara..."
                     />
                <x-form.form-error errorFor="staff_acara" />
            </div>

            <div>
                <x-form.form-label for="hargaDP_paket">
                    Harga DP Rp.
                </x-form.form-label>
                <x-form.form-input type="text"
                    name="hargaDP_paket" id="hargaDP_paket"
                    :value="old('hargaDP_paket')"
                    placeholder="999.999.999"
                    required />
                <x-form.form-error errorFor="hargaDP_paket" />
            </div>

            <div>
                <x-form.form-label for="hargaLunas_paket">
                    Harga lunas Rp.
                </x-form.form-label>
                <x-form.form-input type="text"
                    name="hargaLunas_paket" id="hargaLunas_paket"
                    :value="old('hargaLunas_paket')"
                    placeholder="999.999.999"
                    required />
                <x-form.form-error errorFor="hargaLunas_paket" />
            </div>

            <div>
                <x-form.form-label for="status_paket">
                    Status paket pernikahan
                </x-form.form-label>
                <x-form.form-select
                    name="status_paket" id="status_paket"
                    required>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Tidak tersedia">Tidak tersedia</option>
                </x-form.form-select>
                <x-form.form-error errorFor="status_paket" />
            </div>

            <div>
                <a href="{{ route('admin.paket_pernikahan.index') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setupHargaFormatting();
        });
    </script>

</x-layout>