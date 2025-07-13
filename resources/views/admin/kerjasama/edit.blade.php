<x-layout-form>
    <x-slot:heading>
        KERJASAMA
    </x-slot:heading>

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

                <div class="grid grid-cols-2 gap-3">
                    <div class="flex flex-col gap-3">
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
                    </div>

                    <div class="flex flex-col gap-3">
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
                    </div>
                </div>
                
                <!-- Gambar promosi -->
                <div>
                    <x-form.label for="gambar_promosi">Gambar Promosi</x-form.label>

                    <!-- Preview semua gambar promosi -->
                    <div id="gambar_promosi_preview" class="flex gap-2 flex-wrap border-2 border-slate-500 border-dashed p-3 rounded">
                        <!-- Gambar lama dari database -->
                        @foreach ($kerjasama->gambarPromosi as $gambar)
                            <div class="relative w-32 h-32 border border-slate-300 rounded overflow-hidden">
                                <img src="{{ asset('storage/' . $gambar->file_path) }}" alt="Gambar Promosi" class="object-cover w-full h-full">
                                <!-- Tombol hapus -->
                                <form action="{{ route('admin.gambar_promosi.destroy', $gambar) }}" method="POST" class="absolute top-1 right-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white rounded-full p-1 text-xs hover:bg-red-600">✕</button>
                                </form>
                            </div>
                        @endforeach

                        <!-- Kotak + Tambah Gambar -->
                        <div id="tambah-gambar-box" class="w-32 h-32 flex justify-center items-center bg-slate-100 rounded hover:bg-slate-200 transition cursor-pointer"
                            onclick="document.getElementById('gambar_promosi_input').click()">
                            <span class="poppins-semibold text-slate-600 text-center text-lg">+ Gambar</span>
                        </div>
                    </div>

                    <!-- Hidden file input -->
                    <input type="file" id="gambar_promosi_input" class="hidden" accept="image/*" onchange="addNewImage(this)">

                    <!-- Field hidden untuk menampung file baru -->
                    <div id="gambar_promosi_hidden_inputs"></div>

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
    let newImages = []; // Array untuk menyimpan file baru

    function addNewImage(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            newImages.push(file);

            // Preview gambar
            const reader = new FileReader();
            reader.onload = function (e) {
                const imgWrapper = document.createElement('div');
                imgWrapper.className = "relative w-32 h-32 border border-slate-300 rounded overflow-hidden";

                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = "object-cover w-full h-full";

                imgWrapper.appendChild(img);

                document.getElementById('tambah-gambar-box').before(imgWrapper);
            };
            reader.readAsDataURL(file);

            // Buat hidden input untuk file baru
            createHiddenInput(file);
        }

        // Reset input supaya bisa upload gambar lain
        input.value = '';
    }

    function createHiddenInput(file) {
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);

        const newInput = document.createElement('input');
        newInput.type = 'file';
        newInput.name = 'gambar_promosi[]';
        newInput.files = dataTransfer.files;
        newInput.className = 'hidden';

        document.getElementById('gambar_promosi_hidden_inputs').appendChild(newInput);
    }

    function submitForm() {
        // Cari form terdekat dan submit
        document.querySelector('form').submit();
    }
    </script>


</x-layout-form>