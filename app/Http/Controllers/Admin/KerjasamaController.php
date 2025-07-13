<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use App\Models\RequestMitra;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class KerjasamaController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $kerjasamas = Kerjasama::with('requestMitra')->latest()->simplePaginate(6);

        return view('/admin.kerjasama.index', [
            'kerjasamas' => $kerjasamas,
        ]);
    }

    public function create()
    {
        $requestMitras = RequestMitra::with('pelanggan')->latest()->get();

        return view('admin.kerjasama.create', [
            'requestMitras' =>$requestMitras,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'request_mitra_id'  => ['required', 'exists:request_mitra,id'],
            'upload_file'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'], // Thumbnail usaha
            'gambar_promosi.*'  => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'], // ✅ Multiple gambar promosi
            'noTelp_usaha'      => ['nullable'],
            'email_usaha'       => ['nullable', 'email', 'max:254'],
            'alamat_usaha'      => ['nullable'],
            'harga01'           => ['nullable', 'string'],
            'ket_harga01'       => ['nullable'],
            'harga02'           => ['nullable', 'string'],
            'ket_harga02'       => ['nullable'],
        ]);

        // Cek apakah sudah ada kerjasama untuk request mitra yang sama
        if (Kerjasama::where('request_mitra_id', $validatedData['request_mitra_id'])->exists()) {
            return back()->with('error', 'Kerjasama dengan jenis usaha ini sudah ada!')->withInput();
        }

        // Upload Thumbnail Usaha
        if ($request->hasFile('upload_file')) {
            $validatedData['upload_file'] = $request->file('upload_file')->store('images/kerjasama/thumbnails', 'public');
        }

        // Format harga01 & harga02
        $validatedData['harga01'] = str_replace(['.', ','], ['', '.'], $validatedData['harga01']);
        $validatedData['harga02'] = str_replace(['.', ','], ['', '.'], $validatedData['harga02']);
        $validatedData['harga01'] = number_format((float)$validatedData['harga01'], 2, '.', '');
        $validatedData['harga02'] = number_format((float)$validatedData['harga02'], 2, '.', '');

        // Simpan Kerjasama
        $kerjasama = Kerjasama::create($validatedData);

        // ✅ Upload Gambar Promosi Multiple
        if ($request->hasFile('gambar_promosi')) {
            foreach ($request->file('gambar_promosi') as $file) {
                $path = $file->store('images/kerjasama/promosi', 'public');

                $kerjasama->gambarPromosi()->create([
                    'file_path' => $path,
                ]);
            }
        }

        return redirect('/admin/kerjasama')->with('success', 'Kerjasama dan gambar promosi berhasil disimpan!');
    }

    public function show(Kerjasama $kerjasama)
    {
        return view('admin.kerjasama.show', [
            'kerjasama' => $kerjasama,
        ]);
    }

    public function edit(Kerjasama $kerjasama)
    {
        $requestMitras = RequestMitra::with('pelanggan')->latest()->get();

        return view('admin.kerjasama.edit', [
            'kerjasama'     => $kerjasama,
            'requestMitras' => $requestMitras,
        ]);
    }

    public function update(Request $request, Kerjasama $kerjasama)
    {
        $validatedData = $request->validate([
            'upload_file'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'gambar_promosi.*'  => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'noTelp_usaha'      => ['nullable'],
            'email_usaha'       => ['nullable', 'email', 'max:254'],
            'alamat_usaha'      => ['nullable'],
            'harga01'           => ['nullable', 'string'],
            'ket_harga01'       => ['nullable'],
            'harga02'           => ['nullable', 'string'],
            'ket_harga02'       => ['nullable'],
        ]);

        // ✅ Upload thumbnail
        if ($request->hasFile('upload_file')) {
            $validatedData['upload_file'] = $request->file('upload_file')->store('images/kerjasama/thumbnails', 'public');
        } else {
            $validatedData['upload_file'] = $kerjasama->upload_file;
        }

        // ✅ Format harga
        $validatedData['harga01'] = str_replace(['.', ','], ['', '.'], $validatedData['harga01']);
        $validatedData['harga02'] = str_replace(['.', ','], ['', '.'], $validatedData['harga02']);
        $validatedData['harga01'] = number_format((float)$validatedData['harga01'], 2, '.', '');
        $validatedData['harga02'] = number_format((float)$validatedData['harga02'], 2, '.', '');

        // ✅ Update data kerjasama (tanpa gambar promosi)
        $dataKerjasama = collect($validatedData)->except('gambar_promosi')->toArray();
        $kerjasama->update($dataKerjasama);

        // ✅ Tambahkan gambar promosi baru
        $files = $request->file('gambar_promosi', []);

        // Pakai collect untuk memastikan array
        collect($files)->each(function ($file) use ($kerjasama) {
            if ($file) {
                $path = $file->store('images/kerjasama/promosi', 'public');
                $kerjasama->gambarPromosi()->create([
                    'file_path' => $path,
                ]);
            }
        });

        return redirect('/admin/kerjasama')->with('success', 'Kerjasama berhasil diperbarui.');
    }

    public function destroy(Kerjasama $kerjasama)
    {
        $this->authorize('delete', $kerjasama);

        $kerjasama->delete();

        return redirect('/admin/kerjasama');
    }

    // Search
    public function search(Request $request)
    {
        $search = $request->input('search');

        $kerjasamas = Kerjasama::with('requestMitra')
            ->when($search, function ($query, $search) {
                $query->whereHas('requestMitra', function($subQuery) use ($search) {
                    $subQuery->where('nama_usaha', 'like', '%'. $search . '%');
                });
            })->simplePaginate(6);
        
        return view('admin.kerjasama.index', [
            'kerjasamas' => $kerjasamas,
        ]);
    }
}
