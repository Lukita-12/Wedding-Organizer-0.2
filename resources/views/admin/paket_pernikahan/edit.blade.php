<x-layout>
    <div>
        <h1>Edit Paket Pernikahan</h1>

        <div>
            <x-form.form-layout action="{{ route('admin.paket_pernikahan.update', $paketPernikahan->id) }}">
                @csrf
                @method('PUT')
                
                <div>
                    <x-form.form-label for="nama_paket">
                        Nama paket
                    </x-form.form-label>
                    <x-form.form-input type="text"
                        name="nama_paket" id="nama_paket"
                        value="{{ old('nama_paket', $paketPernikahan->nama_paket) }}"
                        placeholder="Nama paket..."
                        required />
                    <x-form.form-error errorFor="nama_paket" />
                </div>

                @foreach ($jenisUsahas as $jenisUsaha)
                    @php
                        $jenisLabel = ucfirst(str_replace('_', ' ', $jenisUsaha));
                    @endphp
                    <div class="mb-3">
                        <label for="{{ $jenisUsaha }}">{{ $jenisLabel }}</label>
                        <select name="{{ $jenisUsaha }}" class="">
                            <option value="">-- Kosong --</option>
                            @foreach($kerjasamas->where('jenis_usaha', $jenisLabel) as $kerjasama)
                                <option value="{{ $kerjasama->id }}" @selected(old($jenisUsaha, $paketPernikahan->$jenisUsaha) == $kerjasama->id)>
                                    {{ $kerjasama->nama_usaha }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endforeach

                <div>
                <x-form.form-label for="staff_acara">
                    Staff acara
                </x-form.form-label>
                <x-form.form-input type="number"
                    name="staff_acara" id="staff_acara"
                    value="{{ old('staff_acara', $paketPernikahan->staff_acara) }}"
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
                    value="{{ number_format(old('hargaDP_paket', $paketPernikahan->hargaDP_paket ?? 0), 0, ',', '.') }}"
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
                    value="{{ number_format(old('hargaLunas_paket', $paketPernikahan->hargaLunas_paket ?? 0), 0, ',', '.') }}"
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
                    <option value="Tersedia" @selected(old('status_paket', $paketPernikahan->status_paket) == 'Tersedia')>Tersedia</option>
                    <option value="Tidak tersedia" @selected(old('status_paket', $paketPernikahan->status_paket) == 'Tidak tersedia')>Tidak tersedia</option>
                </x-form.form-select>
                <x-form.form-error errorFor="status_paket" />
            </div>

            <div>
                <a href="{{ route('admin.paket_pernikahan.show', $paketPernikahan->id) }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

            </x-form.form-layout>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setupHargaFormatting();
        });
    </script>
</x-layout>