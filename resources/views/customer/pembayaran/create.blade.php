<x-layout-form>
    <x-slot:heading>
        PEMBAYARAN
    </x-slot:heading>

    <div>
        <h1>Pembayaran Pesanan</h1>

        <x-form.layout action="{{ route('customer.pembayaran.store', $pesanan->id) }}" enctype="multipart/form-data">
            <x-form.input type="hidden" name="pesanan_id" id="pesanan_id" value="{{ $pesanan->id }}" />
                <x-form.container>

                    <div>
                        <x-form.label for="bukti_pembayaran">
                            Bukti pembayaran
                        </x-form.label>
                        <x-form.input type="file"
                            name="bukti_pembayaran" id="bukti_pembayaran"
                            placeholder="Bukti pembayaran..."
                            required />
                        <x-form.error errorFor="bukti_pembayaran" />
                    </div>

                    <div>
                        <x-form.label for="bayar_dp">
                            Bayar DP
                        </x-form.label>
                        <x-form.select
                            name="bayar_dp" id="bayar_dp"
                            :value="old('bayar_dp')"
                            required>
                            <option value="Belum dibayar">Pilih pembayaran</option>
                            <option value="Sudah dibayar">Bayar dp</option>
                        </x-form.select>
                        <x-form.error errorFor="bayar_dp" />
                    </div>

                    <div>
                    <x-form.label for="bayar_lunas">
                            Bayar lunas
                        </x-form.label>
                        <x-form.select
                            name="bayar_lunas" id="bayar_lunas"
                            :value="old('bayar_lunas')"
                            required>
                            <option value="Belum dibayar">Pilih pembayaran</option>
                            <option value="Sudah dibayar">Bayar lunas</option>
                        </x-form.select>
                        <x-form.error errorFor="bayar_lunas" />
                    </div>

                    <x-form.button-container>
                        <x-form.button-link href="#">Batal</x-form.button-link>
                        <x-form.button type="submit">Bayar</x-form.button>
                    </x-form.button-container>

                </x-form.container>
        </x-form.layout>
    </div>
</x-layout-form>