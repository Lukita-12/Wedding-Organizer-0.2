<x-layout-form>
    <x-slot:heading>
        PESANAN
    </x-slot:heading>

    <div>
        <h1>Edit pesanan</h1>

        <x-form.layout action="{{ route('customer.pesanan.update', $pesanan->id) }}">
            @method('PUT')
            <x-form.container>

                <div>
                    <x-form.label for="pengantin_pria">
                        Nama pengantin pria
                    </x-form.label>
                    <x-form.input type="text"
                        name="pengantin_pria" id="pengantin_pria"
                        value="{{ old('pengantin_pria', $pesanan->pengantin_pria) }}"
                        placeholder="Nama pengantin pria..."
                        required />
                    <x-form.error errorFor="pengantin_pria" />
                </div>

                <div>
                    <x-form.label for="pengantin_wanita">
                        Nama pengantin wanita
                    </x-form.label>
                    <x-form.input type="text"
                        name="pengantin_wanita" id="pengantin_wanita"
                        value="{{ old('pengantin_wanita', $pesanan->pengantin_wanita) }}"
                        placeholder="Nama pengantin wanita..."
                        required />
                    <x-form.error errorFor="pengantin_wanita" />
                </div>

                <div>
                    <x-form.label for="tanggal_acara">
                        Tanggal acara
                    </x-form.label>
                    <x-form.input type="date"
                        name="tanggal_acara" id="tanggal_acara"
                        value="{{ old('tanggal_acara', $pesanan->tanggal_acara->format('Y-m-d')) }}"
                        required />
                    <x-form.error errorFor="tanggal_acara" />
                </div>

                <div>
                    <x-form.label for="tanggal_diskusi">
                        Tanggal diskusi
                    </x-form.label>
                    <x-form.input type="date"
                        name="tanggal_diskusi" id="tanggal_diskusi"
                        value="{{ old('tanggal_diskusi', $pesanan->tanggal_diskusi->format('Y-m-d')) }}"
                        required />
                    <x-form.error errorFor="tanggal_diskusi" />
                </div>

                <div class="mb-3">
                    <x-form.label for="paket_pernikahan_id" class="label">
                        Paket Pernikahan
                    </x-form.label>
                    <x-form.select name="paket_pernikahan_id" class="select">
                        <option value="">--Tidak ada paket--</option>
                        @foreach($paketPernikahans as $paketPernikahan)
                            <option value="{{ $paketPernikahan->id }}"
                                {{ old('paket_pernikahan_id', $pesanan->paket_pernikahan_id) == $paketPernikahan->id ? 'selected' : '' }}>
                                {{ $paketPernikahan->nama_paket }} - {{ $paketPernikahan->status_paket }}
                            </option>
                        @endforeach
                    </x-form.select>
                </div>

                <x-form.button-container>
                    <x-form.button-link href="{{ route('customer.pesanan.index') }}">Batal</x-form.button-link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.button-container>

            </x-form.container>
        </x-form.layout>
    </div>
</x-layout-form>