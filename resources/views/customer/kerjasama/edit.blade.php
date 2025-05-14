<x-layout>

    <x-form.container variant="main">
        <x-form.form action="{{ route('customer.kerjasama.update', $kerjasama) }}">
            @method('PUT')

            <x-form.container variant="form">
                <!-- Field Request mitra -->
                <div class="w-full flex flex-col gap-1">
                    <x-form.label for="nama_pemilik">Nama Pemilik</x-form.label>
                    <x-form.input type="text" name="nama_pemilik" id="nama_pemilik" :value="old('nama_pemilik', $kerjasama->requestMitra->nama_pemilik)" placeholder="Nama pemilik..." />
                    <x-form.error errorFor="nama_pemilik" />
                </div>

                <div class="w-full flex flex-col gap-1">
                    <x-form.label for="nama_usaha">Nama Usaha</x-form.label>
                    <x-form.input type="text" name="nama_usaha" id="nama_usaha" :value="old('nama_usaha', $kerjasama->requestMitra->nama_usaha)" placeholder="Nama usaha..." />
                    <x-form.error errorFor="nama_usaha" />
                </div>

                <div class="w-full flex flex-col gap-1">
                    <x-form.label for="jenis_usaha">Jenis Usaha</x-form.label>
                    <x-form.select name="jenis_usaha" id="jenis_usaha" required>
                        <option value="Venue"           {{ old('jenis_usaha', $kerjasama->requestMitra->jenis_usaha) === 'Venue'            ? 'selected' : '' }}>Venue</option>
                        <option value="Dekorasi"        {{ old('jenis_usaha', $kerjasama->requestMitra->jenis_usaha) === 'Dekorasi'         ? 'selected' : '' }}>Dekorasi</option>
                        <option value="Tata rias"       {{ old('jenis_usaha', $kerjasama->requestMitra->jenis_usaha) === 'Tata rias'        ? 'selected' : '' }}>Tata rias</option>
                        <option value="Catering"        {{ old('jenis_usaha', $kerjasama->requestMitra->jenis_usaha) === 'Catering'         ? 'selected' : '' }}>Catering</option>
                        <option value="Kue pernikahan"  {{ old('jenis_usaha', $kerjasama->requestMitra->jenis_usaha) === 'Kue pernikahan'   ? 'selected' : '' }}>Kue pernikahan</option>
                        <option value="Fotografer"      {{ old('jenis_usaha', $kerjasama->requestMitra->jenis_usaha) === 'Fotografer'       ? 'selected' : '' }}>Fotografer</option>
                        <option value="Entertainment"   {{ old('jenis_usaha', $kerjasama->requestMitra->jenis_usaha) === 'Entertainment'    ? 'selected' : '' }}>Entertainment</option>
                    </x-form.select>
                    <x-form.error errorFor="jenis_usaha" />
                </div>

                <!-- Field kerjasama -->
                <div class="w-full flex flex-col gap-1">
                    <x-form.label for="noTelp_usaha">No. Telpon/WA</x-form.label>
                    <x-form.input type="text" name="noTelp_usaha" id="noTelp_usaha" :value="old('noTelp_usaha', $kerjasama->noTelp_usaha)" placeholder="No. telpon/WA..." />
                    <x-form.error errorFor="noTelp_usaha" />
                </div>

                <x-form.container variant="">
                    <x-form.label for="email_usaha">Email usaha</x-form.label>
                    <x-form.input type="email" name="email_usaha" id="email_usaha" :value="old('email_usaha', $kerjasama->email_usaha)" placeholder="Email usaha..." />
                    <x-form.error errorFor="email_usaha" />
                </x-form.container>

                <x-form.container variant="">
                    <x-form.label for="alamat_usaha">Alamat usaha</x-form.label>
                    <x-form.textarea type="text" name="alamat_usaha" id="alamat_usaha" placeholder="Alamat usaha...">
                        {{ old('alamat_usaha', $kerjasama->alamat_usaha) }}
                    </x-form.textarea>
                    <x-form.error errorFor="alamat_usaha" />
                </x-form.container>

                <x-form.container variant="">
                    <x-form.label for="harga01">Harga 01</x-form.label>
                    <x-form.input type="text" name="harga01" id="harga01" step="0.01" min="0" :value="old('harga01', number_format($kerjasama->harga01, 0, ',', '.'))" placeholder="999.999.999" oninput="formatRupiah(this)" />
                    <x-form.error errorFor="harga01" />
                </x-form.container>
    
                <x-form.container variant="">
                    <x-form.label for="ket_harga01">Keterangan harga 01</x-form.label>
                    <x-form.textarea type="text" name="ket_harga01" id="ket_harga01" placeholder="Keterangan harga 01...">
                        {{ old('ket_harga01', $kerjasama->ket_harga01) }}
                    </x-form.textarea>
                    <x-form.error errorFor="ket_harga01" />
                </x-form.container>

                <x-form.container variant="">
                    <x-form.label for="harga02">Harga 02</x-form.label>
                    <x-form.input type="text" name="harga02" id="harga02" step="0.01" min="0" :value="old('harga02', number_format($kerjasama->harga02, 0, ',', '.'))" placeholder="999.999.999" oninput="formatRupiah(this)" />
                    <x-form.error errorFor="harga02" />
                </x-form.container>
    
                <x-form.container variant="">
                    <x-form.label for="ket_harga02">Keterangan harga 02</x-form.label>
                    <x-form.textarea type="text" name="ket_harga02" id="ket_harga02" placeholder="Keterangan harga 02...">
                        {{ old('ket_harga02', $kerjasama->ket_harga02) }}
                    </x-form.textarea>
                    <x-form.error errorFor="ket_harga02" />
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.link href="{{ route('customer.kerjasama.index') }}">Batal</x-form.link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.container>
            </x-form.container>
        </x-form.form>

        @if (session('error'))
            <script>
                alert("{{ session('error') }}");
            </script>
        @endif
    </x-form.container>

</x-layout>