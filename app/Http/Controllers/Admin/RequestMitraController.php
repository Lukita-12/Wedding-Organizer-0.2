<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequestMitra;
use Illuminate\Http\Request;

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
        $requestMitra->status_request = 'Diterima';
        $requestMitra->save();

        return redirect('/admin/request-mitra');
    }

    public function reject(Requestmitra $requestMitra)
    {
        $requestMitra->status_request = 'Ditolak';
        $requestMitra->save();

        return redirect('/admin/request-mitra');
    }
}
