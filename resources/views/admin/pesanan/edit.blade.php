<x-layout-form>
    <x-slot:heading>
        PESANAN
    </x-slot:heading>

    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.pesanan.update', $pesanan) }}">
            @method('PUT')

            <x-form.container variant="form">
                <div>
                    <x-form.label for="pelanggan_id">Pelanggan</x-form.label>
                    <x-form.select name="pelanggan_id" id="pelanggan_id" required>
                        <option value="">Pilih pelanggan</option>
                        @foreach ($pelanggans as $pelanggan)
                            <option value="{{ $pelanggan->id }}"
                                {{ (string) old('pelanggan_id', $pesanan->pelanggan_id) === (string) $pelanggan->id ? 'selected' : '' }}>
                                {{ $pelanggan->nama_pelanggan }}
                            </option>
                        @endforeach
                    </x-form.select>
                    <x-form.error errorFor="pelanggan_id" />
                </div>

                <div>
                    <x-form.label for="paket_pernikahan">Paket Pernikahan</x-form.label>
                    <x-form.select name="paket_pernikahan_id" id="paket_pernikahan_id">
                        <option value="">Pilih paket pernikahan</option>
                        <option value="">Tanpa paket pernikahan</option>
                        @foreach ($paketPernikahans as $paketPernikahan)
                            <option value="{{ $paketPernikahan->id }}"
                                {{ (string) old('paket_pernikahan_id', $pesanan->paket_pernikahan_id) === (string) $paketPernikahan->id ? 'selected' : '' }}>
                                {{ $paketPernikahan->nama_paket }}
                            </option>
                        @endforeach
                    </x-form.select>
                    <x-form.error errorFor="paket_pernikahan_id" />
                </div>

                <div>
                    <x-form.label for="tanggal_pesanan">Tanggal Pesanan</x-form.label>
                    <x-form.input type="date" name="tgl_pesanan" id="tgl_pesanan" :value="old('tgl_pesanan', $pesanan->tgl_pesanan->format('Y-m-d'))" required />
                    <x-form.error errorFor="tgl_pesanan" />
                </div>

                <div>
                    <x-form.label for="pengantin_pria">Pengantin Pria</x-form.label>
                    <x-form.input type="text" name="pengantin_pria" id="pengantin_pria" :value="old('pengantin_pria', $pesanan->pengantin_pria)" placeholder="Nama pengantin pria..." required />
                    <x-form.error errorFor="pengantin_pria" />
                </div>

                <div>
                    <x-form.label for="pengantin_wanita">Pengantin Wanita</x-form.label>
                    <x-form.input type="text" name="pengantin_wanita" id="pengantin_wanita" :value="old('pengantin_wanita', $pesanan->pengantin_wanita)" placeholder="Nama pengantin wanita..." required />
                    <x-form.error errorFor="pengantin_wanita" />
                </div>

                <div>
                    <x-form.label for="tanggal_diskusi">Tanggal Diskusi/Perancanaan</x-form.label>
                    <x-form.input type="date" name="tanggal_diskusi" id="tanggal_diskusi" :value="old('tanggal_diskusi', $pesanan->tanggal_diskusi->format('Y-m-d'))" required />
                    <x-form.error errorFor="tanggal_diskusi" />
                </div>

                <div>
                    <x-form.label for="tanggal_acara">Tanggal Acara</x-form.label>
                    <x-form.input type="date" name="tanggal_acara" id="tanggal_acara" :value="old('tanggal_acara', $pesanan->tanggal_acara->format('Y-m-d'))" required />
                    <x-form.error errorFor="tanggal_acara" />
                </div>

                <div>
                    <x-form.label for="total_harga">Total Harga</x-form.label>
                    <x-form.input type="text" name="total_harga_pesanan" id="total_harga_pesanan" :value="old('total_harga_pesanan', number_format($pesanan->total_harga_pesanan, 0, ',', '.'))" placeholder="000.000.000" required />
                    <x-form.error errorFor="total_harga_pesanan" />
                </div>

                <div>
                    <x-form.label for="status_pesanan">Status Pesanan</x-form.label>
                    <x-form.select name="status_pesanan" id="status_pesanan" requried>
                        <option value="Dalam proses"{{ old('status_pesanan', $pesanan->status_pesanan) === 'Dalam proses' ? 'selected' : '' }}>Dalam proses</option>
                        <option value="Diterima"    {{ old('status_pesanan', $pesanan->status_pesanan) === 'Diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="Dibatalkan"  {{ old('status_pesanan', $pesanan->status_pesanan) === 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        <option value="Selesai"     {{ old('status_pesanan', $pesanan->status_pesanan) === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </x-form.select>
                    <x-form.error errorFor="status_pesanan" />
                </div>

                <x-form.container variant="button">
                    <x-form.link href="{{ route('admin.pesanan.index') }}">Batal</x-form.link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.container>
            </x-form.container>
        </x-form.form>
    </x-form.container>
</x-layout-form>