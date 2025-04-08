<x-layout>

    <div>
        @if($kerjasamas->isEmpty())
            <p>No partner data available yet.</p>
        @else
        <table>
            <thead>
                <tr>
                    <td>Pemilik usaha</td>
                    <td>Nama usaha</td>
                    <td>Jenis usaha</td>
                    <td>No. Telpon/WA usaha</td>
                    <td>Email usaha</td>
                    <td>Alamat usaha</td>
                    <td>Harga 01</td>
                    <td>Keterangan harga 01</td>
                    <td>Harga 02</td>
                    <td>Keterangan harga 02</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($kerjasamas as $kerjasama)
                    <tr>
                        <td>{{ $kerjasama->nama_pemilik }}</td>
                        <td>{{ $kerjasama->nama_usaha }}</td>
                        <td>{{ $kerjasama->jenis_usaha }}</td>
                        <td>{{ $kerjasama->noTelp_usaha }}</td>
                        <td>{{ $kerjasama->email_usaha }}</td>
                        <td>{{ $kerjasama->alamat_usaha }}</td>
                        <td>{{ $kerjasama->harga01 }}</td>
                        <td>{{ $kerjasama->ket_harga01 }}</td>
                        <td>{{ $kerjasama->harga02 }}</td>
                        <td>{{ $kerjasama->ket_harga02 }}</td>
                        <td>
                            <a href="{{ route('customer.kerjasama.show', $kerjasama->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

</x-layout>