<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create(Pesanan $pesanan)
    {
         // Pastikan hanya pemilik pesanan yang bisa akses
         $this->authorize('bayar', $pesanan);

        return view('customer.pembayaran.create', [
            'pesanan' => $pesanan,
        ]);
    }

    public function store(Request $request, Pesanan $pesanan)
    {
        $validatedData = $request->validate([
            'pesanan_id'        => ['required', 'exists:pesanan,id'],
            'bukti_pembayaran'  => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:10240'],
            'bayar_dp'          => ['required'],
            'bayar_lunas'       => ['nullable'],
        ]);

        // Handle file upload
        $imagePath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        
        $validatedData['tgl_pembayaran'] = now();
        $validatedData['bukti_pembayaran'] = $imagePath;
        // $validatedData['bayar_lunas'] = 'Belum dibayar' ;
        
        Pembayaran::create($validatedData);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
