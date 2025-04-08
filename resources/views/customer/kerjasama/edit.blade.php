<x-layout>

    <div>
        <x-form.form-layout action="{{ route('customer.kerjasama.update', $kerjasama->id) }}">
            @method('PUT')

            <div>
                <x-form.form-label for="noTelp_usaha">
                    No. Telpon/WA usaha
                </x-form.form-label>
                <x-form.form-input type="text"
                    name="noTelp_usaha" id="noTelp_usaha"
                    value="{{ old('noTelp_usaha', $kerjasama->noTelp_usaha) }}"
                    placeholder="No. Telpon/WA usaha..."
                    required />
                <x-form.form-error errorFor="noTelp_usaha" />
            </div>

            <div>
                <x-form.form-label for="email_usaha">
                    Email usaha
                </x-form.form-label>
                <x-form.form-input type="email"
                    name="email_usaha" id="email_usaha"
                    value="{{ old('email_usaha', $kerjasama->email_usaha) }}"
                    placeholder="Email usaha..."
                    required />
                <x-form.form-error errorFor="email_usaha" />
            </div>

            <div>
                <x-form.form-label for="alamat_usaha">
                    Alamat usaha
                </x-form.form-label>
                <x-form.form-textarea type="text"
                    name="alamat_usaha" id="alamat_usaha"
                    placeholder="Alamat usaha..."
                    required>
                        {{ old('alamat_usaha', $kerjasama->alamat_usaha) }}
                </x-form.form-textarea>
                <x-form.form-error errorFor="alamat_usaha" />
            </div>

            <div>
                <x-form.form-label for="harga01">
                    Harga 01 Rp.
                </x-form.form-label>
                <x-form.form-input type="text"
                    name="harga01" id="harga01"
                    step="0.01" min="0"
                    value="{{ old('harga01', number_format($kerjasama->harga01, 0, ',', '.')) }}"
                    placeholder="999.999.999"
                    oninput="formatRupiah(this)"
                    required />
                <x-form.form-error errorFor="harga01" />
            </div>

            <div>
                <x-form.form-label for="ket_harga01">
                    Keterangan harga 01
                </x-form.form-label>
                <x-form.form-textarea type="text"
                    name="ket_harga01" id="ket_harga01"
                    placeholder="Keterangan harga 01..."
                    required>
                        {{ old('ket_harga01', $kerjasama->ket_harga01) }}
                </x-form.form-textarea>
                <x-form.form-error errorFor="ket_harga01" />
            </div>

            <div>
                <x-form.form-label for="harga02">
                    Harga 02 Rp.
                </x-form.form-label>
                <x-form.form-input type="text"
                    name="harga02" id="harga02"
                    step="0.01" min="0"
                    value="{{ old('harga02', number_format($kerjasama->harga02, 0, ',', '.')) }}"
                    placeholder="999.999.999"
                    oninput="formatRupiah(this)"
                    required />
                <x-form.form-error errorFor="harga02" />
            </div>

            <div>
                <x-form.form-label for="ket_harga02">
                    Keterangan harga 02
                </x-form.form-label>
                <x-form.form-textarea type="text"
                    name="ket_harga02" id="ket_harga02"
                    placeholder="Keterangan harga 02..."
                    required>
                        {{ old('ket_harga02', $kerjasama->ket_harga02) }}
                </x-form.form-textarea>
                <x-form.form-error errorFor="ket_harga02" />
            </div>

            <div>
                <a href="{{ url('/') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>

</x-layout>