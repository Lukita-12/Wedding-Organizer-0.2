<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with(['pelanggan'])->latest()->simplePaginate(6);

        return view('admin.pesanan.index', compact('pesanans'));
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
    public function show(Pesanan $pesanan)
    {
        dd('Hello!');
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

    public function accept(Pesanan $pesanan)
    {
        $pesanan->update([
            'status_pesanan' => 'Dikonfirmasi',
        ]);

        return redirect()
            ->route('admin.pesanan.index')
            ->with('success', 'Pesanan berhasil di-konfirmasi!');
    }

    public function reject(Pesanan $pesanan)
    {
        $pesanan->update([
            'status_pesanan' => 'Dibatalkan',
        ]);

        return redirect()
            ->route('admin.pesanan.index')
            ->with('success', 'Pesanan berhasil di-tolak/batalkan!');
    }
}
