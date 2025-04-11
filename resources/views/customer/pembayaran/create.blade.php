<x-layout>

    <div>
        <h1>Pembayaran Pesanan</h1>

        <x-form.form-layout action="{{ route('customer.pembayaran.store', $pesanan->id) }}" enctype="multipart/form-data">
                <x-form.form-input type="hidden" name="pesanan_id" id="pesanan_id" value="{{ $pesanan->id }}" />

            <div>
                <x-form.form-label for="bukti_pembayaran">
                    Bukti pembayaran
                </x-form.form-label>
                <x-form.form-input type="file"
                    name="bukti_pembayaran" id="bukti_pembayaran"
                    placeholder="Bukti pembayaran..."
                    required />
                <x-form.form-error errorFor="bukti_pembayaran" />
            </div>

            <div>
                <x-form.form-label for="bayar_dp">
                    Bayar DP
                </x-form.form-label>
                <x-form.form-select
                    name="bayar_dp" id="bayar_dp"
                    :value="old('bayar_dp')"
                    required>
                    <option value="Belum dibayar">Pilih pembayaran</option>
                    <option value="Sudah dibayar">Bayar dp</option>
                </x-form.form-select>
                <x-form.form-error errorFor="bayar_dp" />
            </div>

            <div>
            <x-form.form-label for="bayar_lunas">
                    Bayar lunas
                </x-form.form-label>
                <x-form.form-select
                    name="bayar_lunas" id="bayar_lunas"
                    :value="old('bayar_lunas')"
                    required>
                    <option value="Belum dibayar">Pilih pembayaran</option>
                    <option value="Sudah dibayar">Bayar lunas</option>
                </x-form.form-select>
                <x-form.form-error errorFor="bayar_lunas" />
            </div>

            <div>
                <a href="#">Batal</a>
                <button type="submit">Bayar</button>
            </div>

        </x-form.form-layout>
    </div>

</x-layout>