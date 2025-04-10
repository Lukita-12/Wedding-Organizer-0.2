<x-layout>

    <div>
        <div>
            <h1>Bank</h1>

            <a href="{{ route('admin.bank.create') }}">+ Baru</a>
        </div>

        <table>
            <thead>
                <tr>
                    <td class="border px-4 py-2">No.</td>
                    <td class="border px-4 py-2">Nama bank</td>
                    <td class="border px-4 py-2">Nomor rekening</td>
                    <td class="border px-4 py-2">Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($banks as $index => $bank)
                    <tr>
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $bank->nama_bank }}</td>
                        <td class="border px-4 py-2">{{ $bank->no_rekening }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.bank.edit', $bank->id) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.bank.destroy', $bank->id) }}"
                                onsubmit="return confirm('Apakah anda yakin untuk menghapus data?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $banks->links() }}
        </div>
    </div>

</x-layout>