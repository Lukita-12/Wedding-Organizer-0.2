<x-layout>

    <div>
        <h1>Edit bank</h1>

        <x-form.layout action="{{ route('admin.bank.update', $bank->id) }}">
            @csrf
            @method('PUT')
            <x-form.container>

                <div>
                    <x-form.label for="nama_bank">
                        Nama bank:
                    </x-form.label>
                    <x-form.input type="text" 
                        name="nama_bank"
                        id="nama_bank"
                        value="{{ old('nama_bank', $bank->nama_bank) }}"
                        required/>
                    <x-form.error errorFor="nama_bank" />
                </div>

                <div>
                    <x-form.label for="no_rekening">
                        Nomor rekening:
                    </x-form.label>
                    <x-form.input type="text" 
                        name="no_rekening"
                        id="no_rekening"
                        value="{{ old('no_rekening', $bank->no_rekening) }}"
                        required/>
                    <x-form.error errorFor="no_rekening" />
                </div>

                <x-form.button-container>
                    <x-form.button-link href="{{ route('admin.bank.index') }}">Batal</x-form.button-link>
                    <x-form.button type="submit">Simpan</x-form.button>
                </x-form.button-container>

            </x-form.container>
        </x-form.layout>
    </div>

</x-layout>