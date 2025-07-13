<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use App\Models\PaketPernikahan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id'           => ['nullable', 'exists:users,id'],
            'nama_paket'        => ['required', 'string', 'max:255'],
            'upload_file'        => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],

            // Vendor
            'venue'             => ['nullable', 'exists:kerjasama,id'],
            'dekorasi'          => ['nullable', 'exists:kerjasama,id'],
            'tata_rias'         => ['nullable', 'exists:kerjasama,id'],
            'catering'          => ['nullable', 'exists:kerjasama,id'],
            'kue_pernikahan'    => ['nullable', 'exists:kerjasama,id'],
            'fotografer'        => ['nullable', 'exists:kerjasama,id'],
            'entertainment'     => ['nullable', 'exists:kerjasama,id'],

            // Rincian vendor
            'ket_venue'         => ['nullable'],
            'ket_dekorasi'      => ['nullable'],
            'ket_tata_rias'     => ['nullable'],
            'ket_catering'      => ['nullable'],
            'ket_kue_pernikahan'=> ['nullable'],
            'ket_fotografer'    => ['nullable'],
            'ket_entertainment' => ['nullable'],

            'status_paket'      => ['required', 'in:Tersedia,Tidak tersedia,Eksklusif'],
        ]);

        // Simpan file upload jika ada
        if ($request->hasFile('upload_file')) {
            $path = $request->file('upload_file')->store('uploads/paket', 'public');
            $validatedData['upload_file'] = $path;
        }

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
            'user_id'            => ['nullable', 'exists:users,id'],
            'upload_file'        => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'nama_paket'         => ['required', 'string', 'max:255'],

            // Vendor
            'venue'              => ['nullable', 'exists:kerjasama,id'],
            'dekorasi'           => ['nullable', 'exists:kerjasama,id'],
            'tata_rias'          => ['nullable', 'exists:kerjasama,id'],
            'catering'           => ['nullable', 'exists:kerjasama,id'],
            'kue_pernikahan'     => ['nullable', 'exists:kerjasama,id'],
            'fotografer'         => ['nullable', 'exists:kerjasama,id'],
            'entertainment'      => ['nullable', 'exists:kerjasama,id'],

            // Rincian vendor
            'ket_venue'          => ['nullable'],
            'ket_dekorasi'       => ['nullable'],
            'ket_tata_rias'      => ['nullable'],
            'ket_catering'       => ['nullable'],
            'ket_kue_pernikahan' => ['nullable'],
            'ket_fotografer'     => ['nullable'],
            'ket_entertainment'  => ['nullable'],

            'status_paket'       => ['required', 'in:Tersedia,Tidak tersedia,Eksklusif'],
        ]);

        if ($request->hasFile('upload_file')) {
            // Hapus file lama jika ada
            if ($paketPernikahan->upload_file && Storage::disk('public')->exists($paketPernikahan->upload_file)) {
                Storage::disk('public')->delete($paketPernikahan->upload_file);
            }

            // Upload file baru
            $validatedData['upload_file'] = $request->file('upload_file')->store('images/paket_pernikahan', 'public');
        }

        $paketPernikahan->update($validatedData);

        return redirect()->route('admin.paket_pernikahan.index')
                        ->with('success', 'Paket pernikahan berhasil diperbarui.');
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
