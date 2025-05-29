<x-layout-form>
    <x-slot:heading>
        ULASAN
    </x-slot:heading>

    <x-form.container variant="main">
        <x-form.form action="{{ route('customer.ulasan.store') }}" enctype="multipart/form-data">
            <x-form.container variant="form">
                <x-form.container>
                    <x-form.input type="file" name="upload_file" id="upload_file" accept="image/*" class="hidden" onchange="imagePreview(event, 'upload-file')"/>

                    <label for="upload_file">
                        <div class="h-40 flex flex-col justify-center items-center p-1 border-2 border-slate-500 border-dashed cursor-pointer overflow-hidden">
                            <img src="#" alt="Upload File" id="upload-file" class="hidden object-cover object-center">
                            <span class="poppins-semibold bg-slate-100 w-full h-full flex justify-center items-center text-slate-600 text-center text-2xl transition delay-50 duration-300 hover:bg-slate-300 hover:text-teal-600">
                                + Upload
                            </span>
                        </div>
                    </label>

                    <x-form.error errorFor="upload_file" />
                </x-form.container>

                <x-form.container>
                    <x-form.label for="no_rekening">Ulasan</x-form.label>
                    <x-form.textarea name="ulasan" id="ulasan" placeholder="Ulasan...">
                        {{ old('ulasan') }}
                    </x-form.textarea>
                    <x-form.error errorFor="ulasan" />
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.link href="{{ route('home') }}">Batal</x-form.button-link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.container>
            </x-form.container>
        </x-form.form>
    </x-form.container>
</x-layout-form>