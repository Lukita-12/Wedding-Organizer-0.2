<x-layout-form>
    <x-slot:heading>
        KERJASAMA
    </x-slot:heading>

    <x-form.container variant="main">
        <x-form.form action="{{ route('customer.kerjasama.update', $kerjasama) }}" enctype="multipart/form-data">
            @method('PUT')

            <x-form.container variant="form">
                <div>
                    <input type="file" name="upload_file" id="upload_file" class="hidden" accept="image/*" onchange="imagePreview(event, 'upload-file')">
                    @php
                        $imagePath = $kerjasama->upload_file ?? null;
                    @endphp

                    <label for="upload_file">
                        <div class="h-40 flex flex-col justify-center items-center p-1 border-2 border-slate-500 border-dashed cursor-pointer overflow-hidden">
                            <img src="{{ $imagePath ? asset('storage/' . $imagePath) : '#' }}" alt="Gambar/Logo Usaha" id="upload-file"
                                class="{{ $imagePath ? 'object-contain h-full' : 'hidden object-contain h-full' }}">
                            <span class="poppins-semibold bg-slate-100 w-full h-full flex justify-center items-center text-slate-600 text-center text-2xl transition delay-50 duration-300 hover:bg-slate-300 hover:text-teal-600 {{ $imagePath ? 'hidden' : '' }}">+ Gambar</span>
                        </div>
                    </label>

                    <x-form.error errorFor="upload_file" />
                </div>

                <!-- Field Request mitra -->
                <div class="w-full flex flex-col gap-1">
                    <x-form.label for="nama_pemilik">Nama Pemilik</x-form.label>
                    <x-form.input type="text" name="nama_pemilik" id="nama_pemilik" :value="old('nama_pemilik', $kerjasama->requestMitra->nama_pemilik)" placeholder="Nama pemilik..." />
                    <x-form.error errorFor="nama_pemilik" />
                </div>

                
                <!-- Field kerjasama -->
                <div class="grid grid-cols-2 gap-4">
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
                    
                    <div class="">
                        <x-form.label for="noTelp_usaha">No. Telpon/WA</x-form.label>
                        <x-form.input type="text" name="noTelp_usaha" id="noTelp_usaha" :value="old('noTelp_usaha', $kerjasama->noTelp_usaha)" placeholder="No. telpon/WA..." />
                        <x-form.error errorFor="noTelp_usaha" />
                    </div>
    
                    <x-form.container variant="">
                        <x-form.label for="email_usaha">Email usaha</x-form.label>
                        <x-form.input type="email" name="email_usaha" id="email_usaha" :value="old('email_usaha', $kerjasama->email_usaha)" placeholder="Email usaha..." />
                        <x-form.error errorFor="email_usaha" />
                    </x-form.container>
                </div>

                <x-form.container variant="">
                    <x-form.label for="alamat_usaha">Alamat usaha</x-form.label>
                    <x-form.textarea type="text" name="alamat_usaha" id="alamat_usaha" placeholder="Alamat usaha...">
                        {{ old('alamat_usaha', $kerjasama->alamat_usaha) }}
                    </x-form.textarea>
                    <x-form.error errorFor="alamat_usaha" />
                </x-form.container>

                <!-- Gambar Promosi -->
                <div>
                    <x-form.label for="gambar_promosi" >Gambar Promosi</x-form.label>

                    <div class="grid grid-cols-5 gap-3 p-3 border-2 border-slate-500 border-dashed rounded-md">

                        @if ($kerjasama->gambarPromosi->count())
                            @foreach ($kerjasama->gambarPromosi as $gambar)
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $gambar->file_path) }}"
                                        alt="Gambar Promosi"
                                        class="w-full h-48 object-cover rounded-sm">

                                    <!-- Tombol hapus -->
                                    <button type="button"
                                            onclick="hapusGambarPromosi('{{ $gambar->id }}', this)"
                                            class="absolute top-2 right-2 poppins-semibold bg-red-500 text-white rounded-full flex items-center justify-center text-xl px-2 py-0">
                                        &times;
                                    </button>
                                </div>
                            @endforeach
                        @endif


                        <!-- Gambar promosi baru (preview) -->
                        <template id="preview-template">
                            <div class="relative">
                                <img src=""
                                    alt="Preview Gambar"
                                    class="w-full h-48 object-cover rounded-sm">

                                <button type="button"
                                        onclick="this.parentNode.remove();"
                                        class="absolute top-2 right-2 poppins-semibold bg-red-500 text-white rounded-full flex items-center justify-center text-xl px-2 py-0">
                                    &times;
                                </button>
                            </div>
                        </template>

                        <!-- Upload gambar promosi baru -->
                        <div>
                            <!-- Label sebagai trigger input file -->
                            <label for="gambar_promosi" class="block cursor-pointer">
                                <div class="w-full h-48 bg-slate-100 flex justify-center items-center rounded-sm transition delay-50 duration-300 hover:bg-teal-500/50">
                                    <span class="poppins-semibold text-slate-500 text-5xl border-2 border-slate-500 rounded-full px-3 py-1">+</span>
                                </div>
                            </label>

                            <!-- Input file disembunyikan -->
                            <input type="file" name="gambar_promosi[]" id="gambar_promosi"
                                accept="image/*" multiple
                                class="hidden" onchange="previewGambarPromosi(event)">
                            <x-form.error errorFor="gambar_promosi" />
                        </div>

                    </div>
                </div>


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

    <script>
        // Preview gambar
        function previewGambarPromosi(event) {
            const files = event.target.files;
            const container = event.target.closest('.grid');

            for (const file of files) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('preview-template').content.cloneNode(true);
                    preview.querySelector('img').src = e.target.result;
                    container.insertBefore(preview, container.lastElementChild);
                };
                reader.readAsDataURL(file);
            }

            // Reset input supaya user bisa pilih file yang sama lagi
            event.target.value = '';
        }

        // Hapus gambar
        function hapusGambarPromosi(gambarId, button) {
            if (confirm('Yakin ingin menghapus gambar ini?')) {
                fetch('/gambar-promosi/' + gambarId, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                })
                .then(response => {
                    if (response.ok) {
                        // Hapus elemen gambar dari DOM
                        button.parentNode.remove();
                    } else {
                        alert('Gagal menghapus gambar. Coba lagi.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan. Coba lagi.');
                });
            }
        }
    </script>

</x-layout-form>