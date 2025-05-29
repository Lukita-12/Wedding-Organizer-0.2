<x-layout-form>
    <x-slot:heading>
        AKUN
    </x-slot:heading>

    <x-form.container variant="main">
        <x-form.form action="{{ route('customer.akun.update', $user) }}" enctype="multipart/form-data">
            <x-form.container variant="form">
                @method('PUT')

                <div>
                    <input type="file" name="profile_pic" id="profile_pic" accept="image/*" class="hidden" onchange="imagePreview(event, 'profile-pic')">

                    <label for="profile_pic">
                        @php
                            $imagePath = $user->profile_pic ?? null;
                        @endphp
                        <div class="h-40 flex flex-col justify-center items-center p-1 border-2 border-slate-500 border-dashed cursor-pointer overflow-hidden">
                            <img src="{{ $imagePath ? asset('storage/' . $imagePath) : '#' }}" alt="Profile picture" id="profile-pic"
                                class="{{ $imagePath ? 'object-cover object-center' : 'hidden object-cover object-center' }}">

                            <span class="poppins-semibold bg-slate-100 w-full h-full flex justify-center items-center text-slate-600 text-center text-2xl transition delay-50 duration-300 hover:bg-slate-300 hover:text-teal-600 {{ $imagePath ? 'hidden' : '' }}">
                                + Gambar
                            </span>

                            <x-form.error errorFor="profile_pic" />
                        </div>
                    </label>
                </div>

                <x-form.container>
                    <x-form.label for="name">Username</x-form.label>
                    <x-form.input type="text" name="name" id="name" placeholder="Username" :value="old('name', $user->name)" required/>
                    <x-form.error errorFor="name" />
                </x-form.container>

                <x-form.container>
                    <x-form.label for="email">Email</x-form.label>
                    <x-form.input type="email" name="email" id="email" placeholder="Email" :value="old('email', $user->email)" required/>
                    <x-form.error errorFor="email" />
                </x-form.container>

                <span class="poppins-italic-medium text-red-500/80 text-lg text-center">- Isi hanya jika ingin mengubah password! -</span>

                <div class="flex flex-col border-2 border-teal-500 border-dashed px-3 py-3 gap-3">
                    <x-form.container>
                        <x-form.label for="password" class="text-teal-600!">Password</x-form.label>
                        <x-form.input type="password" name="password" id="password" placeholder="Password" />
                        <x-form.error errorFor="password" />
                    </x-form.container>
    
                    <x-form.container>
                        <x-form.label for="konfirmasi_password" class="text-teal-600!">Konfirmasi Password</x-form.label>
                        <x-form.input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password" />
                        <x-form.error errorFor="password_confirmation" />
                    </x-form.container>
                </div>

                <x-form.container variant="button">
                    <x-form.link href="{{ route('home') }}">Batal</x-form.button-link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.container>
            </x-form.container>
        </x-form.form>
    </x-form.container>
</x-layout-form>