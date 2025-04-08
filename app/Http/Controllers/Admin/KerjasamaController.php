<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class KerjasamaController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $kerjasamas = Kerjasama::with('pelanggan')->latest()->paginate(6);

        return view('/admin.kerjasama.index', [
            'kerjasamas' => $kerjasamas,
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

    /**
     * Display the specified resource.
     */
    public function show(Kerjasama $kerjasama)
    {
        return view('admin.kerjasama.show', [
            'kerjasama' => $kerjasama,
        ]);
    }

    public function edit(Kerjasama $kerjasama)
    {
        return view('admin.kerjasama.edit', [
            'kerjasama' => $kerjasama
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
}
