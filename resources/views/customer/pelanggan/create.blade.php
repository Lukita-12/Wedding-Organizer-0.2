<x-layout>

    <div class="min-h-screen flex flex-col justify-center">
        <form method="POST" action="{{ route('customer.pelanggan.store') }}">
            @csrf
    
            <div class="flex flex-col mx-56 px-10 py-2 bg-slate-200 space-y-3 rounded-lg shadow-lg shadow-slate-500/80">
    
                <div class="flex flex-col gap-1">
                    <label for="nama_lengkap" class="block px-4 py-1 poppins-semibold text-slate-700 text-xl">Nama Lengkap</label>
                    <input type="text" name="nama_pelanggan" id="nama_pelanggan" placeholder="Nama lengkap" class="bg-slate-100 w-full px-4 py-1 inter text-slate-700 text-lg rounded-full focus:outline-none focus:ring-2 focus:ring-teal-500" required>
                    @error ('nama_pelanggan')
                        <div class="lora text-sm text-red-500 italic">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="flex flex-col gap-1">
                    <label for="jenis_kelamin" class="block px-4 py-1 poppins-semibold text-slate-700 text-xl">Jenis Kelamin</label>
                    <select type="text" name="jk_pelanggan" id="jk_pelanggan" class="bg-slate-100 w-full px-4 py-2 inter text-slate-700 text-lg rounded-full focus:outline-none focus:ring-2 focus:ring-teal-500" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error ('jk_pelanggan')
                        <div class="lora text-sm text-red-500 italic">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="flex flex-col gap-1">
                    <label for="noTelp_pelanggan" class="block px-4 py-1 poppins-semibold text-slate-700 text-xl">No. Telpon/WA</label>
                    <input type="text" name="noTelp_pelanggan" id="noTelp_pelanggan" placeholder="No. Telpon/WA" class="bg-slate-100 w-full px-4 py-1 inter text-slate-700 text-lg rounded-full focus:outline-none focus:ring-2 focus:ring-teal-500" required>
                    @error ('noTelp_pelanggan')
                        <div class="lora text-sm text-red-500 italic">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="flex flex-col gap-1">
                    <label for="email_pelanggan" class="block px-4 py-1 poppins-semibold text-slate-700 text-xl">Email</label>
                    <input type="email" name="email_pelanggan" id="email_pelanggan" placeholder="Email" class="bg-slate-100 w-full px-4 py-1 inter text-slate-700 text-lg rounded-full focus:outline-none focus:ring-2 focus:ring-teal-500" required>
                    @error ('email_pelanggan')
                        <div class="lora text-sm text-red-500 italic">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="flex flex-col gap-1">
                    <label for="alamat_pelanggan" class="block px-4 py-1 poppins-semibold text-slate-700 text-xl">Alamat</label>
                    <textarea type="text" name="alamat_pelanggan" id="alamat_pelanggan" placeholder="Alamat lengkap" class="bg-slate-100 w-full px-4 py-1 inter text-slate-700 text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 resize-none" required></textarea>
                    @error ('alamat_pelanggan')
                        <div class="lora text-sm text-red-500 italic">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="flex justify-end gap-2 my-4">
                    <a href="{{ route('customer.kerjasama.index') }}" class="w-1/10 inline-block border-2 border-red-500 px-3 py-1 poppins-semibold text-center text-lg text-red-500 rounded-md transition duration:300 hover:bg-red-500 hover:text-slate-100 hover:ring-2 hover:ring-offset-2 hover:ring-red-500">Batal</a>
                    <button type="submit" class="w-1/10 bg-teal-500 px-3 py-1 poppins-semibold text-center text-slate-100 rounded-md transition duration:300 hover:ring-2 hover:ring-offset-2 hover:ring-teal-500">Buat</button>
                </div>
            </div>
    
        </form>
    </div>
</x-layout>