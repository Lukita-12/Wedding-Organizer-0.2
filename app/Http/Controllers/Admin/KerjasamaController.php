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
            'noTelp_usaha'      => ['required'],
            'email_usaha'       => ['required', 'email', 'max:254'],
            'alamat_usaha'      => ['required'],
            'harga01'           => ['required', 'string'],
            'ket_harga01'       => ['required'],
            'harga02'           => ['required', 'string'],
            'ket_harga02'       => ['required'],
        ]);

        // Cek apakah sudah ada kerjasama untuk request mitra yang sama
        if (Kerjasama::where('request_mitra_id', $validatedData['request_mitra_id'])->exists()) {
            return back()->with('error', 'Kerjasama dengan jenis usaha ini sudah ada!')->withInput();
        }

        // Remove thousand separators (dots) and convert comma to decimal point
        $validatedData['harga01'] = str_replace(['.', ','], ['', '.'], $validatedData['harga01']);
        $validatedData['harga02'] = str_replace(['.', ','], ['', '.'], $validatedData['harga02']);
    
        // Convert to proper decimal format
        $validatedData['harga01'] = number_format((float) $validatedData['harga01'], 2, '.', '');
        $validatedData['harga02'] = number_format((float) $validatedData['harga02'], 2, '.', '');

        Kerjasama::create($validatedData);

        return redirect('/admin/kerjasama');
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
            'noTelp_usaha'  => ['required'],
            'email_usaha'   => ['required', 'email', 'max:254'],
            'alamat_usaha'  => ['required'],
            'harga01'       => ['required', 'string'],
            'ket_harga01'   => ['required'],
            'harga02'       => ['required', 'string'],
            'ket_harga02'   => ['required'],
        ]);

        // Remove thousand separators (dots) and convert comma to decimal point
        $validatedData['harga01'] = str_replace(['.', ','], ['', '.'], $validatedData['harga01']);
        $validatedData['harga02'] = str_replace(['.', ','], ['', '.'], $validatedData['harga02']);
    
        // Convert to proper decimal format
        $validatedData['harga01'] = number_format((float) $validatedData['harga01'], 2, '.', '');
        $validatedData['harga02'] = number_format((float) $validatedData['harga02'], 2, '.', '');

        $kerjasama->update($validatedData);

        return redirect('/admin/kerjasama');
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
