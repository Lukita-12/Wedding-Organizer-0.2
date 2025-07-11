<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use App\Models\PaketPernikahan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaketPernikahanController extends Controller
{
    public function index()
    {
        $paketPernikahans = PaketPernikahan::with([
            'venueUsaha.requestMitra', 'dekorasiUsaha.requestMitra', 'tataRiasUsaha.requestMitra',
            'cateringUsaha.requestMitra', 'kuePernikahanUsaha.requestMitra', 'fotograferUsaha.requestMitra',
            'entertainmentUsaha.requestMitra', 'user'
        ])->latest()->simplePaginate(6);

        return view('admin.paket_pernikahan.index', compact('paketPernikahans'));
    }

    public function create()
    {
        // Ambil kerjasama per kategori yang status_request-nya "Diterima"
        $kerjasamasByJenis = [
            'venue' => Kerjasama::whereHas('requestMitra', function ($query) {
                $query->where('jenis_usaha', 'Venue')->where('status_request', 'Diterima');
            })->with('requestMitra')->get(),

            'dekorasi' => Kerjasama::whereHas('requestMitra', function ($query) {
                $query->where('jenis_usaha', 'Dekorasi')->where('status_request', 'Diterima');
            })->with('requestMitra')->get(),

            'tata_rias' => Kerjasama::whereHas('requestMitra', function ($query) {
                $query->where('jenis_usaha', 'Tata Rias')->where('status_request', 'Diterima');
            })->with('requestMitra')->get(),

            'catering' => Kerjasama::whereHas('requestMitra', function ($query) {
                $query->where('jenis_usaha', 'Catering')->where('status_request', 'Diterima');
            })->with('requestMitra')->get(),

            'kue_pernikahan' => Kerjasama::whereHas('requestMitra', function ($query) {
                $query->where('jenis_usaha', 'Kue Pernikahan')->where('status_request', 'Diterima');
            })->with('requestMitra')->get(),

            'fotografer' => Kerjasama::whereHas('requestMitra', function ($query) {
                $query->where('jenis_usaha', 'Fotografer')->where('status_request', 'Diterima');
            })->with('requestMitra')->get(),

            'entertainment' => Kerjasama::whereHas('requestMitra', function ($query) {
                $query->where('jenis_usaha', 'Entertainment')->where('status_request', 'Diterima');
            })->with('requestMitra')->get(),
        ];

        $users = User::where('role', 'customer')->get(); // Hanya user dengan role customer

        return view('admin.paket_pernikahan.create', [
            'kerjasamasByJenis' => $kerjasamasByJenis,
            'users' => $users
        ]);

        /*
        $jenisUsahas = ['Venue', 'Dekorasi', 'Tata rias', 'Catering', 'Kue pernikahan', 'Fotografer', 'Entertainment'];
        $jenisUsahasSlugged = collect($jenisUsahas)->mapWithKeys(fn($item) => [Str::slug($item, '_') => $item]);

        $kerjasamaByJenis = [];
        foreach ($jenisUsahas as $jenisUsaha) {
            $kerjasamaByJenis[$jenisUsaha] = Kerjasama::whereHas('requestMitra', function ($query) use ($jenisUsaha) {
                $query->where('jenis_usaha', $jenisUsaha)
                    ->where('status_request', 'Diterima');
            })->with('requestMitra')->latest()->get();
        }

        $users = User::where('role', 'customer')->latest()->get();

        return view('admin.paket_pernikahan.create', [
            'jenisUsahasSlugged'=> $jenisUsahasSlugged,
            'kerjasamaByJenis'  => $kerjasamaByJenis,
            'users'             => $users,
        ]);
        */
    }

    public function store(Request $request)
    {
        // Validasi semua input termasuk pilihan harga per kategori
        $validatedData = $request->validate([
            'nama_paket' => ['required', 'string', 'max:255'],
            'upload_file' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
            'status_paket' => ['required', 'in:Tersedia,Tidak tersedia,Eksklusif'],
            'user_id' => ['nullable', 'exists:users,id'],

            // Foreign key kerjasama & harga pilihan
            'venue' => ['nullable', 'exists:kerjasama,id'],
            'venue_ket_harga' => ['nullable', 'in:harga01,harga02'],
            'dekorasi' => ['nullable', 'exists:kerjasama,id'],
            'dekorasi_ket_harga' => ['nullable', 'in:harga01,harga02'],
            'tata_rias' => ['nullable', 'exists:kerjasama,id'],
            'tata_rias_ket_harga' => ['nullable', 'in:harga01,harga02'],
            'catering' => ['nullable', 'exists:kerjasama,id'],
            'catering_ket_harga' => ['nullable', 'in:harga01,harga02'],
            'kue_pernikahan' => ['nullable', 'exists:kerjasama,id'],
            'kue_pernikahan_ket_harga' => ['nullable', 'in:harga01,harga02'],
            'fotografer' => ['nullable', 'exists:kerjasama,id'],
            'fotografer_ket_harga' => ['nullable', 'in:harga01,harga02'],
            'entertainment' => ['nullable', 'exists:kerjasama,id'],
            'entertainment_ket_harga' => ['nullable', 'in:harga01,harga02'],

            'staff_acara' => ['nullable', 'integer', 'min:0'],
        ]);

        // Hitung harga total dari pilihan kerjasama
        $totalHarga = 0;
        $dpPersentase = 0.2; // 20% dari total harga untuk DP

        foreach (['venue', 'dekorasi', 'tata_rias', 'catering', 'kue_pernikahan', 'fotografer', 'entertainment'] as $kategori) {
            $kerjasamaId = $validatedData[$kategori] ?? null;
            $ketHarga = $validatedData[$kategori . '_ket_harga'] ?? null;

            if ($kerjasamaId && $ketHarga) {
                $kerjasama = Kerjasama::find($kerjasamaId);
                $hargaField = $ketHarga === 'harga01' ? 'harga01' : 'harga02';
                $totalHarga += $kerjasama->$hargaField ?? 0;
            }
        }

        $validatedData['hargaLunas_paket'] = $totalHarga;
        $validatedData['hargaDP_paket'] = $totalHarga * $dpPersentase;

        // Upload file jika ada
        if ($request->hasFile('upload_file')) {
            $path = $request->file('upload_file')->store('paket_pernikahan', 'public');
            $validatedData['upload_file'] = $path;
        }

        PaketPernikahan::create($validatedData);

        return redirect()->route('admin.paket_pernikahan.index')->with('success', 'Paket pernikahan berhasil dibuat.');
    }

    /*
    public function store(Request $request)
    {
        dd($request->all());

        $validatedData = $request->validate([
            'user_id'           => ['nullable', 'exists:users,id'],
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
    */

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
        $jenisUsahas = ['Venue', 'Dekorasi', 'Tata rias', 'Catering', 'Kue pernikahan', 'Fotografer', 'Entertainment'];
        $jenisUsahasSlugged = collect($jenisUsahas)->mapWithKeys(fn($item) => [Str::slug($item, '_') => $item]);

        $kerjasamaByJenis = [];
        foreach ($jenisUsahas as $jenisUsaha) {
            $kerjasamaByJenis[$jenisUsaha] = Kerjasama::whereHas('requestMitra', function ($query) use ($jenisUsaha) {
                $query->where('jenis_usaha', $jenisUsaha)
                    ->where('status_request', 'Diterima');
            })->with('requestMitra')->latest()->get();
        }

        $users = User::latest()->get();

        return view('admin.paket_pernikahan.edit', [
            'jenisUsahasSlugged'=> $jenisUsahasSlugged,
            'kerjasamaByJenis'  => $kerjasamaByJenis,
            'paketPernikahan'   => $paketPernikahan,
            'users'             => $users,
        ]);
    }

    public function update(Request $request, PaketPernikahan $paketPernikahan)
    {
        $validatedData = $request->validate([
            'user_id'           => ['nullable', 'exists:users,id'],
            'upload_file'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
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

        if ($request->hasFile('upload_file')) {
            $validatedData['upload_file']   = $request->file('upload_file')->store('images/paket_pernikahan', 'public');
        } else {
            $validatedData['upload_file']   = $paketPernikahan->upload_file;
        }

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

    // Search
    public function search(Request $request)
    {
        $search = $request->input('search');

        $paketPernikahans = PaketPernikahan::with(
            'venueUsaha.requestMitra', 'dekorasiUsaha.requestMitra', 'tataRiasUsaha.requestMitra',
            'cateringUsaha.requestMitra', 'kuePernikahanUsaha.requestMitra', 'fotograferUsaha.requestMitra',
            'entertainmentUsaha.requestMitra', 'user'
        )->when($search, function ($query, $search) {
                return $query->where('nama_paket', 'like', '%' . $search . '%' );
        })->latest()->simplePaginate(6);

        return view('admin.paket_pernikahan.index', [
            'paketPernikahans' => $paketPernikahans,
        ]);
    }

    // Filter
    public function filter(Request $request)
    {
        $filterStatus = $request->input('status_paket');

        $paketPernikahans = PaketPernikahan::with(
            'venueUsaha.requestMitra', 'dekorasiUsaha.requestMitra', 'tataRiasUsaha.requestMitra',
            'cateringUsaha.requestMitra', 'kuePernikahanUsaha.requestMitra', 'fotograferUsaha.requestMitra',
            'entertainmentUsaha.requestMitra', 'user'
        )->when($filterStatus, function($query, $filterStatus) {
            return $query->where('status_paket', $filterStatus);
        })->latest()->simplePaginate(6);

        return view('admin.paket_pernikahan.index', [
            'paketPernikahans' => $paketPernikahans,
        ]);
    }
}
