<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Kerjasama;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\RequestMitra;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Card
        $jumlahPermintaan   = RequestMitra::count();
        $jumlahPembayaran   = Pembayaran::count();
        $jumlahKerjasama    = Kerjasama::count();
        $jumlahPesanan      = Pesanan::count();
        // Table
        $pesanans   = Pesanan::with('pelanggan', 'paketPernikahan')->latest()->simplePaginate(3);
        $akuns      = User::latest()->simplePaginate(3);
        $banks      = Bank::latest()->simplePaginate(3);

        return view('dashboard', [
            'jumlahPermintaan'  => $jumlahPermintaan,
            'jumlahPembayaran'  => $jumlahPembayaran,
            'jumlahKerjasama'   => $jumlahKerjasama,
            'jumlahPesanan'     => $jumlahPesanan,
            'pesanans'          => $pesanans,
            'akuns'             => $akuns,
            'banks'             => $banks,
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
