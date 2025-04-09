<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\PaketPernikahan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $paketId = $request->query('paket_pernikahan');
        $selectedPaket = null;

        // if ($request->has('paket_pernikahan_id')) {
        //     $selectedPaket = PaketPernikahan::where('status_paket', 'Tersedia')
        //                                         ->orWhere('status_paket', 'Eksklusif')
        //                                         ->find($request->input('paket_pernikahan_id'));
        // }
        if ($paketId) {
            $selectedPaket = PaketPernikahan::where(function ($query) {
                $query->where('status_paket', 'Tersedia')
                      ->orWhere(function ($query) {
                          $query->where('status_paket', 'Eksklusif')
                                ->where('custom_paket_for', Auth::id());
                      });
            })->find($paketId);
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
