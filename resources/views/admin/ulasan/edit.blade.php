<x-layout-form>
    <x-slot:heading>
        ULASAN
    </x-slot:heading>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.ulasan.update', $ulasan) }}" enctype="multipart/form-data">
            @method('PUT')

            <div>
                <x-form.input type="file" name="upload_file" id="upload_file" accept="image/*" class="hidden" onchange="imagePreview(event, 'upload-file')" />

                <label for="upload_file">
                    @php
                        $imagePath = $ulasan->upload_file ?? null;
                    @endphp
                    <div class="h-40 flex flex-col justify-center items-center p-1 border-2 border-slate-500 border-dashed cursor-pointer overflow-hidden">
                        <img id="upload-file" src="{{ $imagePath ? asset('storage/' . $imagePath) : '#' }}" alt="Preview DP"
                            class="{{ $imagePath ? 'object-contain h-full' : 'hidden object-contain h-full' }}">
                        <span class="poppins-medium bg-slate-100 w-full h-full flex justify-center items-center text-teal-600 text-center text-lg transition delay-50 duration-300 hover:bg-slate-300 {{ $imagePath ? 'hidden' : '' }}">+ Tambah</span>
                    </div>
                </label>
                <x-form.error errorFor="upload_file" />
            </div>

            <x-form.container variant="form">
                <x-form.container>
                    <x-form.label for="user">User</x-form.label>
                    <x-form.select name="user_id" id="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ (string) old('user_id', $ulasan->user_id) === (string) $user->id ? 'selected' : '' }}>
                                {{ $user->name }},
                            </option>
                        @endforeach
                    </x-form.select>
                    <x-form.error errorFor="user" />
                </x-form.container>

                <x-form.container>
                    <x-form.label for="no_rekening">Ulasan</x-form.label>
                    <x-form.textarea name="ulasan" id="ulasan">
                        {{ old('ulasan', $ulasan->ulasan) }}
                    </x-form.textarea>
                    <x-form.error errorFor="ulasan" />
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.link href="{{ route('admin.ulasan.index') }}">Batal</x-form.button-link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.container>
            </x-form.container>
        </x-form.form>
    </x-form.container>
</x-layout-form>