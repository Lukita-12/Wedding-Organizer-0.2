<x-layout-form>
    <x-slot:heading>
        KERJASAMA
    </x-slot:heading>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.kerjasama.store') }}" enctype="multipart/form-data">
            <x-form.container variant="form">
                <!-- Kerjasama thumbnail -->
                <div>
                    <input type="file" name="upload_file" id="upload_file" class="hidden" accept="image/*" onchange="imagePreview(event, 'upload-file')">

                    <label for="upload_file">
                        <div class="h-40 flex flex-col justify-center items-center p-1 border-2 border-slate-500 border-dashed cursor-pointer overflow-hidden">
                            <img src="#" alt="Gambar/Logo Usaha" id="upload-file" class="hidden object-contain h-full">
                            <span class="poppins-semibold bg-slate-100 w-full h-full flex justify-center items-center text-slate-600 text-center text-2xl transition delay-50 duration-300 hover:bg-slate-300 hover:text-teal-600">+ Gambar</span>
                        </div>
                    </label>

                    <x-form.error errorFor="upload_file" />
                </div>

                <!-- Pemilik & Jenis usaha -->
                <x-form.container variant="">
                    <x-form.label for="pemilik">Pemilik & Nama Usaha</x-form.label>
                    <x-form.select name="request_mitra_id" id="request_mitra_id" required>
                        @foreach ($requestMitras as $requestMitra)
                            <option value="{{ $requestMitra->id }}" {{ (string) old('request_mitra_id') == (string) $requestMitra->id ? 'selected' : '' }}>
                                {{ $requestMitra->nama_pemilik }}, {{ $requestMitra->nama_usaha }}
                            </option>
                        @endforeach
                    </x-form.select>
                    <x-form.error errorFor="request_mitra_id" />
                </x-form.container>

                <div class="grid grid-cols-2 gap-3">
                    <x-form.container variant="">
                        <x-form.label for="noTelp_usaha">No. Telpon/WA</x-form.label>
                        <x-form.input type="text" name="noTelp_usaha" id="noTelp_usaha" :value="old('noTelp_usaha')" placeholder="No. telpon/WA..." required />
                        <x-form.error errorFor="noTelp_usaha" />
                    </x-form.container>

                    <x-form.container variant="">
                        <x-form.label for="email_usaha">Email usaha</x-form.label>
                        <x-form.input type="email" name="email_usaha" id="email_usaha" :value="old('email_usaha')" placeholder="Email usaha..." required />
                        <x-form.error errorFor="email_usaha" />
                    </x-form.container>
                </div>


                <x-form.container variant="">
                    <x-form.label for="alamat_usaha">Alamat usaha</x-form.label>
                    <x-form.textarea type="text" name="alamat_usaha" id="alamat_usaha" placeholder="Alamat usaha..." required>
                        {{ old('alamat_usaha') }}
                    </x-form.textarea>
                    <x-form.error errorFor="alamat_usaha" />
                </x-form.container>
                
                <!-- Upload gambar promosi -->
                <div>
                    <!-- Hidden file input -->
                    <input type="file" id="gambar_promosi_input" name="gambar_promosi[]" class="hidden" accept="image/*" multiple onchange="handleFiles(this.files)">
                    
                    <!-- Preview container -->
                    <div id="gambar_promosi_preview" class="flex gap-2 flex-wrap border-2 border-slate-500 border-dashed p-3 rounded cursor-pointer" onclick="document.getElementById('gambar_promosi_input').click()">
                        <!-- + Tambah Gambar box -->
                        <div id="tambah-gambar-box" class="w-48 h-48 flex justify-center items-center bg-slate-100 rounded hover:bg-slate-200 transition">
                            <span class="poppins-semibold text-slate-600 text-center text-lg">+ Gambar</span>
                        </div>
                    </div>

                    <x-form.error errorFor="gambar_promosi" />
                </div>

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

    <script>
        function handleFiles(files) {
            const previewContainer = document.getElementById('gambar_promosi_preview');
            const tambahGambarBox = document.getElementById('tambah-gambar-box');

            // Loop semua file yang dipilih
            for (let i = 0; i < files.length; i++) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Buat elemen gambar
                    const imgWrapper = document.createElement('div');
                    imgWrapper.className = "relative w-48 h-48 rounded overflow-hidden border border-slate-300";

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = "w-full h-full object-cover";

                    imgWrapper.appendChild(img);

                    // Sisipkan thumbnail SEBELUM kotak +Tambah Gambar
                    previewContainer.insertBefore(imgWrapper, tambahGambarBox);
                };
                reader.readAsDataURL(files[i]);
            }
        }
    </script>


</x-layout-form>