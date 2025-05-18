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
        //
    }

    public function store(Request $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    public function edit(Pembayaran $pembayaran)
    {
        return view('customer.pembayaran.edit', [
            'pembayaran' => $pembayaran,
        ]);
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $validatedData = $request->validate([
            'pesanan_id'            => ['required', 'exists:pesanan,id'],
            'bukti_pembayaran_dp'   => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'bukti_pembayaran_lunas'=> ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'bayar_dp'              => ['required', 'in:Belum dibayar,Sudah dibayar'],
            'bayar_lunas'           => ['required', 'in:Belum dibayar,Sudah dibayar'],
        ]);

        $validatedData['tgl_pembayaran'] = now();

        if ($request->hasFile('bukti_pembayaran_dp')) {
            $validatedData['bukti_pembayaran_dp']   = $request->file('bukti_pembayaran_dp')->store('images/bukti_pembayaran/dp', 'public');
        } else {
            $validatedData['bukti_pembayaran_dp']   = $pembayaran->bukti_pembayaran_dp;
        }
        if ($request->hasFile('bukti_pembayaran_lunas')) {
            $validatedData['bukti_pembayaran_lunas']= $request->file('bukti_pembayaran_lunas')->store('images/bukti_pembayaran/lunas', 'public');
        } else {
            $validatedData['bukti_pembayaran_lunas']= $pembayaran->bukti_pembayaran_lunas;
        }

        $pembayaran->update($validatedData);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
