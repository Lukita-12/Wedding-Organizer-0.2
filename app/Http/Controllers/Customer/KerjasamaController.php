<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use App\Models\RequestMitra;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KerjasamaController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // $kerjasamas = Kerjasama::with('requestMitra')->latest()->get();

        $kerjasamas = Kerjasama::with('requestMitra')
            ->whereHas('requestMitra.pelanggan', function ($query) {
                $query->where('user_id', Auth::id());
            })->latest()->get();

        $requestMitras = RequestMitra::with('pelanggan', 'kerjasama')
            ->whereHas('pelanggan', function ($query) {
                $query->where('user_id', Auth::id());
            })->latest()->get();

        return view('/customer.kerjasama.index', [
            'kerjasamas'    => $kerjasamas,
            'requestMitras' => $requestMitras,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    public function show(Kerjasama $kerjasama)
    {
        $this->authorize('view', $kerjasama);

        return view('customer.kerjasama.show', [
            'kerjasama' => $kerjasama,
        ]);
    }

    public function edit(Kerjasama $kerjasama)
    {
        $this->authorize('update', $kerjasama);

        return view('/customer.kerjasama.edit', [
            'kerjasama' => $kerjasama,
        ]);
    }

    public function update(Request $request, Kerjasama $kerjasama)
    {
        $this->authorize('update', $kerjasama);

        $validatedData = $request->validate([
            'nama_pemilik'  => ['required'],
            'nama_usaha'    => ['required'],
            'jenis_usaha'   => ['required'],

            'upload_file'   => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'noTelp_usaha'  => ['required'],
            'email_usaha'   => ['required', 'email', 'max:254'],
            'alamat_usaha'  => ['required'],

            'gambar_promosi'    => ['nullable', 'array'],
            'gambar_promosi.*'  => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
        ]);

        // Upload file utama
        if ($request->hasFile('upload_file')) {
            $validatedData['upload_file'] = $request->file('upload_file')->store('images/kerjasama/images', 'public');
        } else {
            $validatedData['upload_file'] = $kerjasama->upload_file;
        }

        // Upload gambar promosi dulu
        $paths = [];
        if ($request->hasFile('gambar_promosi')) {
            foreach ($request->file('gambar_promosi') as $promosiFile) {
                $paths[] = $promosiFile->store('images/gambar_promosi', 'public');
            }
        }

        DB::transaction(function () use ($validatedData, $kerjasama) {
            // Update kerjasama utama
            $kerjasama->update([
                'upload_file'   => $validatedData['upload_file'],
                'noTelp_usaha'  => $validatedData['noTelp_usaha'],
                'email_usaha'   => $validatedData['email_usaha'],
                'alamat_usaha'  => $validatedData['alamat_usaha'],
            ]);

            // SIMULASI ERROR
            throw new \Exception("Simulasi error: gagal update");

            // Update request mitra (ini tidak akan dieksekusi)
            $kerjasama->requestMitra->update([
                'nama_pemilik'  => $validatedData['nama_pemilik'],
                'nama_usaha'    => $validatedData['nama_usaha'],
                'jenis_usaha'   => $validatedData['jenis_usaha'],
            ]);
        });

        // Tambahkan gambar promosi setelah update sukses
        foreach ($paths as $path) {
            $kerjasama->gambarPromosi()->create([
                'file_path' => $path,
                'caption'   => null,
            ]);
        }

        return redirect('/kerjasama')->with('success', 'Data kerjasama berhasil diperbarui.');
}

    public function destroy(Kerjasama $kerjasama)
    {
        $this->authorize('delete', $kerjasama);

        $kerjasama->delete();

        return redirect('/kerjasama');
    }
}
