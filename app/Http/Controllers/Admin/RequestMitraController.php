<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use App\Models\RequestMitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestMitraController extends Controller
{
    public function index()
    {
        $requestMitras = RequestMitra::with('pelanggan')->latest()->simplePaginate(6);

        return view('/admin.request_mitra.index', [
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

    public function show(RequestMitra $requestMitra)
    {
        // Eager load customer relationship just in case
        $requestMitra->load('pelanggan');

        return view('/admin.request_mitra.show', [
            'requestMitra' => $requestMitra,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestMitra $requestMitra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequestMitra $requestMitra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestMitra $requestMitra)
    {
        //
    }

    public function accept(Requestmitra $requestMitra)
    {
        DB::transaction(function () use ($requestMitra) {
            // 1. Update status            
            $requestMitra->update(['status_request' => 'Diterima']);

            // 2. Create new kerjasama
            Kerjasama::create([
            'request_mitra_id'   => $requestMitra->id,
            'pelanggan_id'      => $requestMitra->pelanggan_id,
            'nama_pemilik'      => $requestMitra->nama_pemilik,
            'nama_usaha'        => $requestMitra->nama_usaha,
            'jenis_usaha'       => $requestMitra->jenis_usaha,
            // leave it null for now
            'noTelp_usaha'      => null,
            'email_usaha'       => null,
            'alamat_usaha'      => null,
            'harga01'           => null,
            'ket_harga01'       => null,
            'harga02'           => null,
            'ket_harga02'       => null,
            ]);
        });

        return redirect('/admin/request-mitra')
            ->with('sukses', 'Permintaan kerjasama telah diterima');
    }

    public function reject(Requestmitra $requestMitra)
    {
        $requestMitra->status_request = 'Ditolak';
        $requestMitra->save();

        return redirect('/admin/request-mitra');
    }
}
