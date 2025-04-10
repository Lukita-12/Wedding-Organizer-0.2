<x-layout>

    <div>
        <h1>Bank</h1>

        <x-form.form-layout action="{{ route('admin.bank.store') }}">

            <div>
                <x-form.form-label for="nama_bank">
                    Nama bank:
                </x-form.form-label>
                <x-form.form-input type="text" 
                    name="nama_bank" id="nama_bank"
                    placeholder="Nama bank"
                    :value="old('nama_bank')"
                    required/>
                <x-form.form-error errorFor="nama_bank" />
            </div>

            <div>
                <x-form.form-label for="no_rekening">
                    Nomor rekening:
                </x-form.form-label>
                <x-form.form-input type="text" 
                    name="no_rekening" id="no_rekening"
                    placeholder="No. rekening"
                    :value="old('no_rekening')"
                    required/>
                <x-form.form-error errorFor="no_rekening" />
            </div>

            <div>
                <a href="{{ route('admin.bank.index') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>

</x-layout>