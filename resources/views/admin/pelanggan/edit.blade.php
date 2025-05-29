<x-layout-form>
    <x-slot:heading>
        PELANGGAN
    </x-slot:heading>

    <div class="w-full bg-slate-200 shadow shadow-slate-500 px-4 py-2">
        <form method="POST" action="{{ route('admin.pelanggan.update', $pelanggan) }}">
            @csrf
            @method('PUT')

            <div class="flex flex-col gap-3">
                <div>
                    <label for="nama_pelanggan" class="block poppins-semibold text-slate-700 text-xl px-3">Nama Pelanggan</label>
                    <select name="user_id" id="user_id" class="w-full poppins bg-slate-100 text-slate-700 text-lg px-3 py-1 outline-none" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ (string) old('user_id', $pelanggan->user_id) === (string) $user->id ? 'selected' : '' }}>
                                {{ $user->name }}, {{ $user->email }}
                            </option>
                        @endforeach
                    </select>
                    @error ('user_id')
                        <span class="inter-italic text-red-500 text-sm px-3 py-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label for="nama_pelanggan" class="block poppins-semibold text-slate-700 text-xl px-3">Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" id="nama_pelanggan" value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}" placeholder="Nama lengkap" class="w-full poppins bg-slate-100 text-slate-700 text-lg px-3 py-1" required>
                    @error ('nama_pelanggan')
                        <span class="inter-italic text-red-500 text-sm px-3 py-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label for="jk_pelanggan" class="block poppins-semibold text-slate-700 text-xl px-3">Jenis Kelamin</label>
                    <select name="jk_pelanggan" id="jk_pelanggan" class="w-full poppins bg-slate-100 text-slate-700 text-lg px-3 py-1 outline-none" required>
                        <option value="Laki-laki" {{ old('jk_pelanggan', $pelanggan->jk_pelanggan) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jk_pelanggan', $pelanggan->jk_pelanggan) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error ('jk_pelanggan')
                        <span class="inter-italic text-red-500 text-sm px-3 py-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label for="noTelp_pelanggan" class="block poppins-semibold text-slate-700 text-xl px-3">No. Telpon/WA</label>
                    <input type="text" name="noTelp_pelanggan" id="noTelp_pelanggan" value="{{ old('noTelp_pelanggan', $pelanggan->noTelp_pelanggan) }}" placeholder="No. Telpon/WA" class="w-full poppins bg-slate-100 text-slate-700 text-lg px-3 py-1" required>
                    @error ('noTelp_pelanggan')
                        <span class="inter-italic text-red-500 text-sm px-3 py-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label for="email_pelanggan" class="block poppins-semibold text-slate-700 text-xl px-3">Email</label>
                    <input type="email" name="email_pelanggan" id="email_pelanggan" value="{{ old('email_pelanggan', $pelanggan->email_pelanggan) }}" placeholder="Email" class="w-full poppins bg-slate-100 text-slate-700 text-lg px-3 py-1" required>
                    @error ('email_pelanggan')
                        <span class="inter-italic text-red-500 text-sm px-3 py-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label for="alamat_pelanggan" class="block poppins-semibold text-slate-700 text-xl px-3">Alamat</label>
                    <textarea name="alamat_pelanggan" id="alamat_pelanggan" placeholder="Alamat" rows="4" class="w-full poppins bg-slate-100 text-slate-700 text-lg px-3 py-1" required>
                        {{ old('alamat_pelanggan', $pelanggan->alamat_pelanggan) }}
                    </textarea>
                    @error ('alamat_pelanggan')
                        <span class="inter-italic text-red-500 text-sm px-3 py-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full flex justify-end gap-3">
                    <a href="{{ route('admin.pelanggan.index') }}" class="w-1/10 inline-block poppins-semibold bg-red-500 text-slate-100 text-center text-lg px-3 py-1 transition delay-50 duration:300 hover:bg-red-700">Batal</a>
                    <button type="submit" class="w-1/10 poppins-semibold bg-teal-500 text-slate-100 text-lg px-3 py-1 transition delay-50 duration:300 hover:bg-teal-700">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</x-layout-form>