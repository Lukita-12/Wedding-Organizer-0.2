<x-layout>
    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.pembayaran.store') }}" enctype="multipart/form-data">
            <x-form.container variant="form">
                <div>
                    <x-form.label for="pesanan">Pesanan</x-form.label>
                    <x-form.select name="pesanan_id" id="pesanan_id">
                        <option value="">Pilih pesanan</option>
                        @foreach ($pesanans as $pesanan)
                            <option value="{{ $pesanan->id }}"
                                {{ (string) old('pesanan_id') === (string) $pesanan->id ? 'selected' : '' }}>
                                {{ $pesanan->pelanggan->nama_pelanggan }}, {{ $pesanan->paketPernikahan->nama_paket ?? '-' }}, {{ $pesanan->id }}
                            </option>
                        @endforeach
                    </x-form.select>
                </div>

                <div>
                    <x-form.label for="tanggal_pembayaran">Tanggal Pembayaran</x-form.label>
                    <x-form.input type="date" name="tgl_pembayaran" id="tgl_pembayaran" :value="old('tgl_pembayaran')" />
                    <x-form.error errorFor="tgl_pembayaran" />
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <x-form.label for="bukti_pembayaran_dp">Bukti Pembayaran DP</x-form.label>
                        <x-form.input type="file" name="bukti_pembayaran_dp" id="bukti_pembayaran_dp" accept="image/*" class="hidden" onchange="imagePreview(event, 'preview-dp')" />

                        <label for="bukti_pembayaran_dp">
                            <div class="h-40 flex flex-col justify-center items-center p-1 border-2 border-slate-500 border-dashed cursor-pointer overflow-hidden">
                                <img id="preview-dp" src="#" alt="Preview DP" class="hidden object-contain h-full">
                                <span class="poppins-medium bg-slate-100 w-full h-full flex justify-center items-center text-teal-600 text-center text-lg transition delay-50 duration-300 hover:bg-slate-300">+ Tambah</span>
                            </div>
                        </label>
                        <x-form.error errorFor="bukti_pembayaran_dp" />
                    </div>
    
                    <div>
                        <x-form.label for="bukti_pembayaran_lunas">Bukti Pembayaran Lunas</x-form.label>
                        <x-form.input type="file" name="bukti_pembayaran_lunas" id="bukti_pembayaran_lunas" accept="image/*" class="hidden" onchange="imagePreview(event, 'preview-lunas')" />

                        <label for="bukti_pembayaran_lunas">
                            <div class="h-40 flex flex-col justify-center items-center p-1 border-2 border-slate-500 border-dashed cursor-pointer overflow-hidden">
                                <img id="preview-lunas" src="#" alt="Preview Lunas" class="hidden object-contain h-full">
                                <span class="poppins-medium bg-slate-100 w-full h-full flex justify-center items-center text-teal-600 text-center text-lg transition delay-50 duration-300 hover:bg-slate-300">+ Tambah</span>
                            </div>
                        </label>
                        <x-form.error errorFor="bukti_pembayaran_lunas" />
                    </div>

                    <div>
                        <x-form.label for="status_pembayaran_dp">Status Pembayaran DP</x-form.label>
                        <x-form.select name="bayar_dp" id="bayar_dp">
                            <option value="Belum dibayar" {{ old('bayar_dp') === 'Belum dibayar' ? 'selected' : '' }}>Belum dibayar</option>
                            <option value="Sudah dibayar" {{ old('bayar_dp') === 'Sudah dibayar' ? 'selected' : '' }}>Sudah dibayar</option>
                        </x-form.select>
                        <x-form.error errorFor="bayar_dp" />
                    </div>
    
                    <div>
                        <x-form.label for="status_pembayaran_lunas">Status Pembayaran Lunas</x-form.label>
                        <x-form.select name="bayar_lunas" id="bayar_lunas">
                            <option value="Belum dibayar" {{ old('bayar_lunas') === 'Belum dibayar' ? 'selected' : '' }}>Belum dibayar</option>
                            <option value="Sudah dibayar" {{ old('bayar_lunas') === 'Sudah dibayar' ? 'selected' : '' }}>Sudah dibayar</option>
                        </x-form.select>
                        <x-form.error errorFor="bayar_lunas" />
                    </div>
                </div>

                <x-form.container variant="button">
                    <x-form.link href="{{ route('admin.pembayaran.index') }}">Batal</x-form.link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.container>
            </x-form.container>
        </x-form.form>
    </x-form.container>
</x-layout>