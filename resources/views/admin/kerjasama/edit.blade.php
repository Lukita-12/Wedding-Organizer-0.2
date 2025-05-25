<x-layout>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.kerjasama.update', $kerjasama) }}" enctype="multipart/form-data">
            @method('PUT')

            <x-form.container variant="form">
                <x-form.container variant="">
                    <x-form.label for="pemilik">Pemilik & Nama Usaha</x-form.label>
                    <x-form.select name="request_mitra_id" id="request_mitra_id" required>
                        @foreach ($requestMitras as $requestMitra)
                            <option value="{{ $requestMitra->id }}" {{ (string) old('request_mitra_id', $kerjasama->request_mitra_id) == (string) $requestMitra->id ? 'selected' : '' }}>
                                {{ $requestMitra->nama_pemilik }}, {{ $requestMitra->nama_usaha }}
                            </option>
                        @endforeach
                    </x-form.select>
                    <x-form.error errorFor="request_mitra_id" />
                </x-form.container>

                <div>
                    <input type="file" name="upload_file" id="upload_file" class="hidden" accept="image/*" onchange="imagePreview(event, 'upload-file')">
                    
                    <label for="upload_file">
                        @php
                            $imagePath = $kerjasama->upload_file ?? null;
                        @endphp
                        <div class="h-40 flex flex-col justify-center items-center p-1 border-2 border-slate-500 border-dashed cursor-pointer overflow-hidden">
                            <img src="{{ $imagePath ? asset('storage/' . $imagePath) : '#' }}" alt="Gambar/Logo Usaha" id="upload-file" 
                                class="{{ $imagePath ? 'object-contain h-full' : 'hidden object-contain h-full' }}">
                                
                            <span class="poppins-semibold bg-slate-100 w-full h-full flex justify-center items-center text-slate-600 text-center text-2xl transition delay-50 duration-300 hover:bg-slate-300 hover:text-teal-600 {{ $imagePath ? 'hidden' : '' }}">
                                + Gambar
                            </span>
                        </div>
                    </label>

                    <x-form.error errorFor="upload_file" />
                </div>

                <div class="w-full flex flex-col gap-1">
                    <x-form.label for="noTelp_usaha">No. Telpon/WA</x-form.label>
                    <x-form.input type="text" name="noTelp_usaha" id="noTelp_usaha" :value="old('noTelp_usaha', $kerjasama->noTelp_usaha)" placeholder="No. telpon/WA..." required />
                    <x-form.error errorFor="noTelp_usaha" />
                </div>

                <x-form.container variant="">
                    <x-form.label for="email_usaha">Email usaha</x-form.label>
                    <x-form.input type="email" name="email_usaha" id="email_usaha" :value="old('email_usaha', $kerjasama->email_usaha)" placeholder="Email usaha..." required />
                    <x-form.error errorFor="email_usaha" />
                </x-form.container>

                <x-form.container variant="">
                    <x-form.label for="alamat_usaha">Alamat usaha</x-form.label>
                    <x-form.textarea type="text" name="alamat_usaha" id="alamat_usaha" placeholder="Alamat usaha..." required>
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
                    <x-form.link href="{{ route('admin.kerjasama.index') }}">Batal</x-form.link>
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