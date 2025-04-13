<x-layout>

    <div>
        <x-form.layout action="{{ route('admin.kerjasama.store') }}">
            <x-form.container>

                <div>
                    <x-form.label for="noTelp_usaha">
                        No. Telpon/WA usaha
                    </x-form.label>
                    <x-form.input type="text"
                        name="noTelp_usaha" id="noTelp_usaha"
                        value="{{ old('noTelp_usaha') }}"
                        placeholder="No. Telpon/WA usaha..."
                        required />
                    <x-form.error errorFor="noTelp_usaha" />
                </div>

                <div>
                    <x-form.label for="email_usaha">
                        Email usaha
                    </x-form.label>
                    <x-form.input type="email"
                        name="email_usaha" id="email_usaha"
                        value="{{ old('email_usaha') }}"
                        placeholder="Email usaha..."
                        required />
                    <x-form.error errorFor="email_usaha" />
                </div>

                <div>
                    <x-form.label for="alamat_usaha">
                        Alamat usaha
                    </x-form.label>
                    <x-form.textarea type="text"
                        name="alamat_usaha" id="alamat_usaha"
                        placeholder="Alamat usaha..."
                        required>
                            {{ old('alamat_usaha') }}
                    </x-form.textarea>
                    <x-form.error errorFor="alamat_usaha" />
                </div>

                <div>
                    <x-form.label for="harga01">
                        Harga 01 Rp.
                    </x-form.label>
                    <x-form.input type="text"
                        name="harga01" id="harga01"
                        step="0.01" min="0"
                        placeholder="999.999.999"
                        oninput="formatRupiah(this)"
                        required />
                    <x-form.error errorFor="harga01" />
                </div>

                <div>
                    <x-form.label for="ket_harga01">
                        Keterangan harga 01
                    </x-form.label>
                    <x-form.textarea
                        type="text"
                        name="ket_harga01"
                        id="ket_harga01"
                        placeholder="Keterangan harga 01..."
                        required>
                            {{ old('ket_harga01') }}
                    </x-form.textarea>
                    <x-form.error errorFor="ket_harga01" />
                </div>

                <div>
                    <x-form.label for="harga02">
                        Harga 02 Rp.
                    </x-form.label>
                    <x-form.input type="text"
                        name="harga02" id="harga02"
                        step="0.01" min="0"
                        placeholder="999.999.999"
                        oninput="formatRupiah(this)"
                        required />
                    <x-form.error errorFor="harga02" />
                </div>

                <div>
                    <x-form.label for="ket_harga02">
                        Keterangan harga 02
                    </x-form.label>
                    <x-form.textarea type="text"
                        name="ket_harga02" id="ket_harga02"
                        placeholder="Keterangan harga 02..."
                        required>
                            {{ old('ket_harga02') }}
                    </x-form.textarea>
                    <x-form.error errorFor="ket_harga02" />
                </div>

                <x-form.button-container>
                    <x-form.button-link href="{{ route('admin.kerjasama.index') }}">Batal</x-form.button-link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.button-container>

            </x-form.container>
        </x-form.layout>
    </div>

</x-layout>