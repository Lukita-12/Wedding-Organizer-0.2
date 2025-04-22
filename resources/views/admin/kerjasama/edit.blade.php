<x-layout>

    <div class="bg-slate-200 w-full flex flex-col px-4 py-4 rounded-lg">
        <h1 class="poppins-semibold text-teal-500 text-3xl text-center">Kerjasama<span class="text-white text-5xl">.</span></h1>

        <span class="my-4"></span>

        <x-form.form action="{{ route('admin.kerjasama.update', $kerjasama) }}">
            @method('PUT')
            
            <div class="flex flex-col gap-3">
                <div class="flex flex-col gap-1">
                    <label for="noTelp_usaha" class="block px-4 poppins-semibold text-slate-700 text-xl">No. Telpon/WA</label>
                    <input type="text" name="noTelp_usaha" id="noTelp_usaha" placeholder="No. telpon/WA..." value="{{ $kerjasama->noTelp_usaha }}" class="bg-slate-100 w-full px-4 py-1 inter text-lg text-slate-700 rounded-full focus:outline-none focus:ring-2 focus:ring-teal-500">
                    <x-form.error errorFor="noTelp_usaha" />
                </div>
    
                <div>
                    <x-form.label for="email_usaha">Email usaha</x-form.label>
                    <x-form.input type="email" name="email_usaha" id="email_usaha" value="{{ $kerjasama->email_usaha }}" placeholder="Email usaha..." required />
                    <x-form.error errorFor="email_usaha" />
                </div>
    
                <div>
                    <x-form.label for="alamat_usaha">Alamat usaha</x-form.label>
                    <textarea type="text" name="alamat_usaha" id="alamat_usaha" placeholder="Alamat usaha..." class="bg-slate-100 w-full px-4 py-1 inter text-slate-700 text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 resize-none" rows="4" required>{{ $kerjasama->alamat_usaha }}</textarea>
                    <x-form.error errorFor="alamat_usaha" />
                </div>
    
                <div>
                    <x-form.label for="harga01">Harga 01 Rp.</x-form.label>
                    <x-form.input type="text" name="harga01" id="harga01" step="0.01" min="0" value="{{ number_format($kerjasama->harga01, 0, ',', '.') }}" placeholder="999.999.999" oninput="formatRupiah(this)" required />
                    <x-form.error errorFor="harga01" />
                </div>
    
                <div>
                    <x-form.label for="ket_harga01">Keterangan harga 01</x-form.label>
                    <x-form.textarea type="text" name="ket_harga01" id="ket_harga01" placeholder="Keterangan harga 01..." required>{{ $kerjasama->ket_harga01 }}</x-form.textarea>
                    <x-form.error errorFor="ket_harga01" />
                </div>
    
                <div>
                    <x-form.label for="harga02">Harga 02 Rp.</x-form.label>
                    <x-form.input type="text" name="harga02" id="harga02" step="0.01" min="0" value="{{ number_format($kerjasama->harga02, 0, ',', '.') }}" placeholder="999.999.999" oninput="formatRupiah(this)" required />
                    <x-form.error errorFor="harga02" />
                </div>
    
                <div>
                    <x-form.label for="ket_harga02">Keterangan harga 02</x-form.label>
                    <x-form.textarea type="text" name="ket_harga02" id="ket_harga02" placeholder="Keterangan harga 02..." required>{{ $kerjasama->ket_harga02 }}</x-form.textarea>
                    <x-form.error errorFor="ket_harga02" />
                </div>
    
                <div class="py-4 flex justify-end items-center gap-3">
                    <a href="{{ route('admin.kerjasama.index') }}" class="w-1/10 inline-block h-fit border-2 border-red-500 px-3 poppins-semibold text-center text-lg text-red-500 rounded-md transition duration:300 hover:bg-red-500 hover:text-slate-100 hover:ring-2 hover:ring-offset-2 hover:ring-red-500">Batal</a>
                    <button type="submit" class="w-1/10 bg-teal-500 border-2 border-teal-500 px-3 poppins-semibold text-center text-lg text-slate-100 rounded-md transition duration:300 hover:ring-2 hover:ring-offset-2 hover:ring-teal-500">Simpan</button>
                </div>
            </div>
        </x-form.form>
    </div>

</x-layout>