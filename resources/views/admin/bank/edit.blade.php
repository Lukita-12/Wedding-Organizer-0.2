<x-layout-form>
    <x-slot:heading>
        BANK
    </x-slot:heading>
    
    <x-form.container variant="main">
        <x-form.form action="{{ route('admin.bank.update', $bank) }}">
            @method('PUT')

            <x-form.container variant="form">
                <x-form.container>
                    <x-form.label for="nama_bank">Nama bank:</x-form.label>
                    <x-form.input type="text" name="nama_bank" id="nama_bank" placeholder="Nama bank" :value="old('nama_bank', $bank->nama_bank)" required/>
                    <x-form.error errorFor="nama_bank" />
                </x-form.container>

                <x-form.container>
                    <x-form.label for="no_rekening">Nomor rekening:</x-form.label>
                    <x-form.input type="text" name="no_rekening" id="no_rekening" placeholder="No. rekening" :value="old('no_rekening', $bank->no_rekening)" required/>
                    <x-form.error errorFor="no_rekening" />
                </x-form.container>

                <x-form.container variant="button">
                    <x-form.link href="{{ route('admin.bank.index') }}">Batal</x-form.button-link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.container>
            </x-form.container>
        </x-form.form>
    </x-form.container>
</x-layout-form>