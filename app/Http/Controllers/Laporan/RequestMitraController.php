<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\RequestMitra;
use Illuminate\Http\Request;

class RequestMitraController extends Controller
{
    public function index()
    {
        $requestMitras = RequestMitra::with('pelanggan')->latest()->get();

        return view('laporan.request_mitra.index', [
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

    /**
     * Display the specified resource.
     */
    public function show(RequestMitra $requestMitra)
    {
        //
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
}
