<x-layout-form>
    <x-slot:heading>
        PAKET PERNIKAHAN
    </x-slot:heading>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.paket_pernikahan.store') }}" enctype="multipart/form-data">
            <x-form.container variant="form">

                <div>
                    <!-- Tempat preview dan upload -->
                    <div id="uploadArea" onclick="document.getElementById('upload_file').click()"
                        class="h-40 flex flex-col justify-center items-center p-1 border-2 border-slate-500 border-dashed cursor-pointer overflow-hidden">

                        <img id="previewImage" class="w-full h-full object-cover hidden" />

                        <span id="uploadPlaceholder" class="poppins-semibold bg-slate-100 w-full h-full flex justify-center items-center text-slate-600 text-center text-2xl transition delay-50 duration-300 hover:bg-slate-300 hover:text-teal-600">
                            + Gambar
                        </span>

                    </div>

                    <input type="file" name="upload_file" id="upload_file" class="hidden" accept="image/*" />
                    <x-form.error errorFor="upload_file" />
                </div>


                <div>
                    <x-form.label for="nama_paket">Nama paket</x-form.label>
                    <x-form.input type="text" name="nama_paket" id="nama_paket" :value="old('nama_paket')" placeholder="Nama paket..." required />
                    <x-form.error errorFor="nama_paket" />
                </div>

                <!-- List Vendor -->
                <div class="grid grid-cols-2 gap-3">

                    <div class="flex flex-col">
                        <x-form.label for="venue">Venue</x-form.label>
                        <x-form.select name="venue" id="venue">
                            <option value="">Pilih Usaha</option>
                            <option value="">Kosongkan</option>
                            @foreach ($kerjasamaByJenis['Venue'] as $kerjasama)
                                <option value="{{ $kerjasama->id }}" {{ (string) old('venue') === (string) $kerjasama->id ? 'selected' : '' }}>
                                    {{ $kerjasama->requestMitra->nama_usaha }}
                                </option>
                            @endforeach
                        </x-form.select>
                    </div>

                    <div>
                        <x-form.label for="ket_venue" class="text-teal-500!">Rincian Venue</x-form.label>
                        <x-form.input type="text" name="ket_venue" id="ket_venue" :value="old('ket_venue')" placeholder="Info venue..." />
                        <x-form.error errorFor="ket_venue" />
                    </div>

                    <!-- Dekorasi -->
                    <div class="flex flex-col">
                        <x-form.label for="dekorasi">Dekorasi</x-form.label>
                        <x-form.select name="dekorasi" id="dekorasi">
                            <option value="">Pilih Usaha</option>
                            <option value="">Kosongkan</option>
                            @foreach ($kerjasamaByJenis['Dekorasi'] as $kerjasama)
                                <option value="{{ $kerjasama->id }}" {{ (string) old('dekorasi') === (string) $kerjasama->id ? 'selected' : '' }}>
                                    {{ $kerjasama->requestMitra->nama_usaha }}
                                </option>
                            @endforeach
                        </x-form.select>
                    </div>

                    <div>
                        <x-form.label for="ket_dekorasi" class="text-teal-500!">Rincian Dekorasi</x-form.label>
                        <x-form.input type="text" name="ket_dekorasi" id="ket_dekorasi" :value="old('ket_dekorasi')" placeholder="Info dekorasi..." />
                        <x-form.error errorFor="ket_dekorasi" />
                    </div>
    
                    <div class="flex flex-col">
                        <x-form.label for="tata_rias">Tata Rias</x-form.label>
                        <x-form.select name="tata_rias" id="tata_rias">
                            <option value="">Pilih Usaha</option>
                            <option value="">Kosongkan</option>
                            @foreach ($kerjasamaByJenis['Tata rias'] as $kerjasama)
                                <option value="{{ $kerjasama->id }}" {{ (string) old('tata_rias') === (string) $kerjasama->id ? 'selected' : '' }}>
                                    {{ $kerjasama->requestMitra->nama_usaha }}
                                </option>
                            @endforeach
                        </x-form.select>
                    </div>

                    <div>
                        <x-form.label for="ket_tata_rias" class="text-teal-500!">Rincian Tata Rias</x-form.label>
                        <x-form.input type="text" name="ket_tata_rias" id="ket_tata_rias" :value="old('ket_tata_rias')" placeholder="Info tata rias..." />
                        <x-form.error errorFor="ket_tata_rias" />
                    </div>
    
                    <div class="flex flex-col">
                        <x-form.label for="catering">Catering</x-form.label>
                        <x-form.select name="catering" id="catering">
                            <option value="">Pilih Usaha</option>
                            <option value="">Kosongkan</option>
                            @foreach ($kerjasamaByJenis['Catering'] as $kerjasama)
                                <option value="{{ $kerjasama->id }}" {{ (string) old('catering') === (string) $kerjasama->id ? 'selected' : '' }}>
                                    {{ $kerjasama->requestMitra->nama_usaha }}
                                </option>
                            @endforeach
                        </x-form.select>
                    </div>

                    <div>
                        <x-form.label for="ket_catering" class="text-teal-500!">Rincian Catering</x-form.label>
                        <x-form.input type="text" name="ket_catering" id="ket_catering" :value="old('ket_catering')" placeholder="Info catering..." />
                        <x-form.error errorFor="ket_catering" />
                    </div>
    
                    <div class="flex flex-col">
                        <x-form.label for="kue_pernikahan">Kue Pernikahan</x-form.label>
                        <x-form.select name="kue_pernikahan" id="kue_pernikahan">
                            <option value="">Pilih Usaha</option>
                            <option value="">Kosongkan</option>
                            @foreach ($kerjasamaByJenis['Kue pernikahan'] as $kerjasama)
                                <option value="{{ $kerjasama->id }}" {{ (string) old('kue_pernikahan') === (string) $kerjasama->id ? 'selected' : '' }}>
                                    {{ $kerjasama->requestMitra->nama_usaha }}
                                </option>
                            @endforeach
                        </x-form.select>
                    </div>

                    <div>
                        <x-form.label for="ket_kue_pernikahan" class="text-teal-500!">Rincian Kue Pernikahan</x-form.label>
                        <x-form.input type="text" name="ket_kue_pernikahan" id="ket_kue_pernikahan" :value="old('ket_kue_pernikahan')" placeholder="Info kue pernikahan..." />
                        <x-form.error errorFor="ket_kue_pernikahan" />
                    </div>
    
                    <div class="flex flex-col">
                        <x-form.label for="fotografer">Fotografer</x-form.label>
                        <x-form.select name="fotografer" id="fotografer">
                            <option value="">Pilih Usaha</option>
                            <option value="">Kosongkan</option>
                            @foreach ($kerjasamaByJenis['Fotografer'] as $kerjasama)
                                <option value="{{ $kerjasama->id }}" {{ (string) old('fotografer') === (string) $kerjasama->id ? 'selected' : '' }}>
                                    {{ $kerjasama->requestMitra->nama_usaha }}
                                </option>
                            @endforeach
                        </x-form.select>
                    </div>

                    <div>
                        <x-form.label for="ket_fotografer" class="text-teal-500!">Rincian Foto</x-form.label>
                        <x-form.input type="text" name="ket_fotografer" id="ket_fotografer" :value="old('ket_fotografer')" placeholder="Info foto..." />
                        <x-form.error errorFor="ket_fotografer" />
                    </div>
    
                    <div class="flex flex-col">
                        <x-form.label for="entertainment">Entertainment</x-form.label>
                        <x-form.select name="entertainment" id="entertainment">
                            <option value="">Pilih Usaha</option>
                            <option value="">Kosongkan</option>
                            @foreach ($kerjasamaByJenis['Entertainment'] as $kerjasama)
                                <option value="{{ $kerjasama->id }}" {{ (string) old('entertainment') === (string) $kerjasama->id ? 'selected' : '' }}>
                                    {{ $kerjasama->requestMitra->nama_usaha }}
                                </option>
                            @endforeach
                        </x-form.select>
                    </div>

                    <div>
                        <x-form.label for="ket_entertainment" class="text-teal-500!">Rincian ket_Entertainment</x-form.label>
                        <x-form.input type="text" name="ket_entertainment" id="ket_entertainment" :value="old('ket_entertainment')" placeholder="Info ket_entertainment..." />
                        <x-form.error errorFor="ket_entertainment" />
                    </div>

                </div>

                <div>
                    <x-form.label for="status_paket">Status paket pernikahan</x-form.label>
                    <x-form.select name="status_paket" id="status_paket">
                        <option value="Tersedia" {{ old('status_paket') === 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="Tidak tersedia" {{ old('status_paket') === 'Tidak tersedia' ? 'selected' : '' }}>Tidak tersedia</option>
                        <option value="Eksklusif" {{ old('status_paket') === 'Eksklusif' ? 'selected' : '' }}>Eksklusif</option>
                    </x-form.select>
                    <x-form.error errorFor="status_paket" />
                </div>

                <div>
                    <x-form.label for="user">User</x-form.label>
                    <x-form.select name="user_id" id="user_id">
                        <option value="">Pilih User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ (string) old('user_id') === (string) $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </x-form.select>
                    <x-form.error errorFor="user_id" />
                </div>

                <x-form.container variant="button">
                    <x-form.link href="{{ route('admin.paket_pernikahan.index') }}">Batal</x-form.button-link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.container>
            </x-form.container>
        </x-form.form>
    </x-form.container>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const statusSelect = document.getElementById('status_paket');
            const userSelect = document.getElementById('user_id');

            function toggleUserSelect() {
                if (statusSelect.value === 'Eksklusif') {
                    userSelect.disabled = false;
                } else {
                    userSelect.disabled = true;
                    userSelect.value = ""; // kosongkan jika bukan eksklusif
                }
            }

            // Panggil saat halaman dimuat
            toggleUserSelect();

            // Panggil saat status dipilih ulang
            statusSelect.addEventListener('change', toggleUserSelect);
        });

        // Preview thumbnail paket
        document.getElementById('upload_file').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewImage = document.getElementById('previewImage');
            const uploadPlaceholder = document.getElementById('uploadPlaceholder');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                    uploadPlaceholder.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-layout-form>