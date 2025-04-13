<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use App\Models\PaketPernikahan;
use App\Models\User;
use Illuminate\Http\Request;

class PaketPernikahanController extends Controller
{
    public function index()
    {
        $paketPernikahans = PaketPernikahan::with([
            'venueUsaha', 'dekorasiUsaha', 'tataRiasUsaha',
            'cateringUsaha', 'kuePernikahanUsaha', 'fotograferUsaha',
            'entertainmentUsaha'
        ])->latest()->simplePaginate(6);

        return view('admin.paket_pernikahan.index', compact('paketPernikahans'));
    }

    public function create()
    {
        $kerjasamas = Kerjasama::all();
        $users      = User::where('role', 'customer')->get();

        return view('admin.paket_pernikahan.create', [
            'kerjasamas'=> $kerjasamas,
            'users'     => $users,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'custom_paket_for'  => ['nullable', 'exists:users,id'],
            'nama_paket'        => ['required', 'string', 'max:255'],
            'venue'             => ['nullable', 'exists:kerjasama,id'],
            'dekorasi'          => ['nullable', 'exists:kerjasama,id'],
            'tata_rias'         => ['nullable', 'exists:kerjasama,id'],
            'catering'          => ['nullable', 'exists:kerjasama,id'],
            'kue_pernikahan'    => ['nullable', 'exists:kerjasama,id'],
            'fotografer'        => ['nullable', 'exists:kerjasama,id'],
            'entertainment'     => ['nullable', 'exists:kerjasama,id'],
            'staff_acara'       => ['nullable', 'integer', 'min:0'],
            'hargaDP_paket'     => ['required', 'string'],
            'hargaLunas_paket'  => ['required', 'string'],
            'status_paket'      => ['required', 'in:Tersedia,Tidak tersedia,Eksklusif'],
        ]);

        // Hapus titik dari harga untuk konversi ke integer
        $validatedData['hargaDP_paket']     = (int) str_replace('.', '', $validatedData['hargaDP_paket']);
        $validatedData['hargaLunas_paket']  = (int) str_replace('.', '', $validatedData['hargaLunas_paket']);

        PaketPernikahan::create($validatedData);

        return redirect('/admin/paket-pernikahan');
    }

    public function show(PaketPernikahan $paketPernikahan)
    {
        $paketPernikahan->load([
            'venueUsaha', 'dekorasiUsaha', 'tataRiasUsaha',
            'cateringUsaha', 'kuePernikahanUsaha', 'fotograferUsaha',
            'entertainmentUsaha'
        ]);
    
        return view('admin.paket_pernikahan.show', [
            'paketPernikahan' => $paketPernikahan
        ]);
    }

    public function edit(PaketPernikahan $paketPernikahan)
    {
        $users      = User::where('role', 'customer')->get();
        $jenisUsahas= ['venue', 'dekorasi', 'tata_rias', 'catering', 'kue_pernikahan', 'fotografer', 'entertainment'];
        $kerjasamas = Kerjasama::latest()->get();

        return view('admin.paket_pernikahan.edit', [
            'paketPernikahan'   => $paketPernikahan,
            'users'             => $users,
            'jenisUsahas'       => $jenisUsahas,
            'kerjasamas'        => $kerjasamas,
        ]);
    }

    public function update(Request $request, PaketPernikahan $paketPernikahan)
    {
        $validatedData = $request->validate([
            'custom_paket_for'  => ['nullable', 'exists:users,id'],
            'nama_paket'        => ['required', 'string', 'max:255'],
            'venue'             => ['nullable', 'exists:kerjasama,id'],
            'dekorasi'          => ['nullable', 'exists:kerjasama,id'],
            'tata_rias'         => ['nullable', 'exists:kerjasama,id'],
            'catering'          => ['nullable', 'exists:kerjasama,id'],
            'kue_pernikahan'    => ['nullable', 'exists:kerjasama,id'],
            'fotografer'        => ['nullable', 'exists:kerjasama,id'],
            'entertainment'     => ['nullable', 'exists:kerjasama,id'],
            'staff_acara'       => ['nullable', 'integer', 'min:0'],
            'hargaDP_paket'     => ['required', 'string'],
            'hargaLunas_paket'  => ['required', 'string'],
            'status_paket'      => ['required', 'in:Tersedia,Tidak tersedia,Eksklusif'],
        ]);

        // Hapus titik dari harga untuk konversi ke integer
        $validatedData['hargaDP_paket']     = (int) str_replace('.', '', $validatedData['hargaDP_paket']);
        $validatedData['hargaLunas_paket']  = (int) str_replace('.', '', $validatedData['hargaLunas_paket']);

        $paketPernikahan->update($validatedData);

        return redirect('/admin/paket-pernikahan');
    }

    public function destroy(PaketPernikahan $paketPernikahan)
    {
        $paketPernikahan->delete();

        return redirect('/admin/paket-pernikahan');
    }
}
