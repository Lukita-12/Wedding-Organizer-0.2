<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\PaketPernikahan;
use App\Models\Pesanan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $paketId = $request->query('paket-pernikahan');
        $selectedPaket = null;

        if ($paketId) {
            $selectedPaket = PaketPernikahan::findOrFail($paketId); // akan throw 404 kalau tidak ada
            $this->authorize('view', $selectedPaket); // cek akses ke paket (eksklusif/tidak)   
        }

        return view('/customer.pesanan.create', [
            'selectedPaket' => $selectedPaket,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'paket_pernikahan_id'   => ['nullable', 'exists:paket_pernikahan,id',],
            'pengantin_pria'        => ['required'],
            'pengantin_wanita'      => ['required'],
            'tanggal_acara'         => ['required', 'date'],
            'tanggal_diskusi'       => ['required', 'date'],
        ]);

        // Isi otomatis
        $validatedData['user_id'] = Auth::id();
        $validatedData['tgl_pesanan'] = now();

        // Jika customer memilih paket, ambil harga dari paket tersebut
        if ($request->filled('paket_pernikahan_id')) {
            $paket = PaketPernikahan::findOrFail($request->paket_pernikahan_id);
            $validatedData['total_harga_pesanan'] = $paket->hargaLunas_paket;
        } else {
            $validatedData['total_harga_pesanan'] = 0;
        }
        
        Pesanan::create($validatedData);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
