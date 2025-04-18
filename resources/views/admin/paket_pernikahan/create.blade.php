<x-layout>

    <div>
        <x-form.layout action="{{ route('admin.paket_pernikahan.store') }}">
            <x-form.container>

                <div>
                    <x-form.label for="nama_paket">
                        Nama paket
                    </x-form.label>
                    <x-form.input type="text"
                        name="nama_paket" id="nama_paket"
                        :value="old('nama_paket')"
                        placeholder="Nama paket..."
                        required />
                    <x-form.error errorFor="nama_paket" />
                </div>

                @php
                    $jenisUsahas = ['venue', 'dekorasi', 'tata_rias', 'catering', 'kue_pernikahan', 'fotografer', 'entertainment'];
                @endphp

                @foreach ($jenisUsahas as $jenisUsaha)
                    @php
                        // Ubah 'tata_rias' menjadi 'Tata rias'
                        $jenisLabel = ucfirst(str_replace('_', ' ', $jenisUsaha));
                    @endphp
                    <div>
                        <x-form.label for="{{ $jenisUsaha }}">
                            {{ $jenisLabel }}
                        </x-form.label>
                        <x-form.select name="{{ $jenisUsaha }}">
                            <option value="">Pilih</option>
                            <option value="">--Kosongkan--</option>
                            @foreach ($kerjasamas->where('jenis_usaha', $jenisLabel) as $kerjasama)
                                <option value="{{ $kerjasama->id }}">{{ $kerjasama->nama_usaha }}</option>
                            @endforeach
                        </x-form.select>
                    </div>
                @endforeach

                <div>
                    <x-form.label for="staff_acara">
                        Staff acara
                    </x-form.label>
                    <x-form.input type="number"
                        name="staff_acara" id="staff_acara"
                        :value="old('staff_acara')"
                        placeholder="Staff acara..."
                        />
                    <x-form.error errorFor="staff_acara" />
                </div>

                <div>
                    <x-form.label for="hargaDP_paket">
                        Harga DP Rp.
                    </x-form.label>
                    <x-form.input type="text"
                        name="hargaDP_paket" id="hargaDP_paket"
                        :value="old('hargaDP_paket')"
                        placeholder="999.999.999"
                        required />
                    <x-form.error errorFor="hargaDP_paket" />
                </div>

                <div>
                    <x-form.label for="hargaLunas_paket">
                        Harga lunas Rp.
                    </x-form.label>
                    <x-form.input type="text"
                        name="hargaLunas_paket" id="hargaLunas_paket"
                        :value="old('hargaLunas_paket')"
                        placeholder="999.999.999"
                        required />
                    <x-form.error errorFor="hargaLunas_paket" />
                </div>

                <div>
                    <x-form.label for="status_paket">
                        Status paket pernikahan
                    </x-form.label>
                    <x-form.select
                        name="status_paket" id="status_paket"
                        required>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Tidak tersedia">Tidak tersedia</option>
                        <option value="Eksklusif">Eksklusif</option>
                    </x-form.select>
                    <x-form.error errorFor="status_paket" />
                </div>

                <div>
                    <x-form.label for="custom_paket_for" class="block">Pilih Customer (jika Eksklusif)</x-form.label>
                    <x-form.select name="custom_paket_for" class="">
                        <option value="">-- Umum / Tidak Eksklusif --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" 
                                {{ old('custom_paket_for', $paketPernikahan->custom_paket_for ?? '') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </x-form.select>
                </div>

                <x-form.button-container>
                    <x-form.button-link href="{{ route('admin.paket_pernikahan.index') }}">Batal</x-form.button-link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.button-container>

            </x-form.container>
        </x-form.layout>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setupHargaFormatting();
        });
    </script>

</x-layout>