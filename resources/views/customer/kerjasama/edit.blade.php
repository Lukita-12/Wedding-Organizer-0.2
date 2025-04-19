<x-layout>

    <div>
        <x-form.form action="{{ route('customer.kerjasama.update', $kerjasama->id) }}">
            @method('PUT')
            <x-container.form-fill>

                <x-container.label-input>
                    <x-form.label for="noTelp_usaha">No. Telpon/WA usaha</x-form.label>
                    <x-form.input type="text" name="noTelp_usaha" id="noTelp_usaha"
                        value="{{ old('noTelp_usaha', $kerjasama->noTelp_usaha) }}" placeholder="No. Telpon/WA usaha..."
                        required />
                    <x-form.error errorFor="noTelp_usaha" />
                </x-container.label-input>

                <x-container.label-input>
                    <x-form.label for="email_usaha">
                        Email usaha
                    </x-form.label>
                    <x-form.input type="email" name="email_usaha" id="email_usaha"
                        value="{{ old('email_usaha', $kerjasama->email_usaha) }}" placeholder="Email usaha..."
                        required />
                    <x-form.error errorFor="email_usaha" />
                </x-container.label-input>

                <x-container.label-input>
                    <x-form.label for="alamat_usaha">
                        Alamat usaha
                    </x-form.label>
                    <x-form.textarea type="text" name="alamat_usaha" id="alamat_usaha" placeholder="Alamat usaha..."
                        required>
                        {{ old('alamat_usaha', $kerjasama->alamat_usaha) }}
                    </x-form.textarea>
                    <x-form.error errorFor="alamat_usaha" />
                </x-container.label-input>

                <x-container.label-input>
                    <x-form.label for="harga01">
                        Harga 01
                    </x-form.label>
                    <div class="flex items-center">
                        <span class="px-3 poppins-semibold text-lg text-slate-700">Rp.</span>
                        <x-form.input type="text" name="harga01" id="harga01" step="0.01" min="0"
                            value="{{ old('harga01', number_format($kerjasama->harga01, 0, ',', '.')) }}"
                            placeholder="999.999.999" oninput="formatRupiah(this)" required />
                        <x-form.error errorFor="harga01" />
                    </div>
                </x-container.label-input>

                <x-container.label-input>
                    <x-form.label for="ket_harga01">
                        Keterangan harga 01
                    </x-form.label>
                    <x-form.textarea type="text" name="ket_harga01" id="ket_harga01"
                        placeholder="Keterangan harga 01..." required>
                        {{ old('ket_harga01', $kerjasama->ket_harga01) }}
                    </x-form.textarea>
                    <x-form.error errorFor="ket_harga01" />
                </x-container.label-input>

                <x-container.label-input>
                    <x-form.label for="harga02">
                        Harga 02
                    </x-form.label>
                    <div class="flex items-center">
                        <span class="px-3 poppins-semibold text-lg text-slate-700">Rp.</span>
                        <x-form.input type="text" name="harga02" id="harga02" step="0.01" min="0"
                            value="{{ old('harga02', number_format($kerjasama->harga02, 0, ',', '.')) }}"
                            placeholder="999.999.999" oninput="formatRupiah(this)" required />
                        <x-form.error errorFor="harga02" />
                    </div>
                </x-container.label-input>

                <x-container.label-input>
                    <x-form.label for="ket_harga02">
                        Keterangan harga 02
                    </x-form.label>
                    <x-form.textarea type="text" name="ket_harga02" id="ket_harga02"
                        placeholder="Keterangan harga 02..." required>
                        {{ old('ket_harga02', $kerjasama->ket_harga02) }}
                    </x-form.textarea>
                    <x-form.error errorFor="ket_harga02" />
                </x-container.label-input>

                <x-container.form-button>
                    <x-form.button-link href="{{ route('customer.kerjasama.show', $kerjasama->id) }}">Batal
                    </x-form.button-link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-container.form-button>

            </x-container.form-fill>
        </x-form.form>
    </div>

</x-layout>