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

    /*
    public function index(Request $request)
    {
        // $requestMitras = RequestMitra::with('pelanggan')->latest()->simplePaginate(6);
        $query = RequestMitra::with('pelanggan');

        // Search
        if ($request->filled('search_request')) {
            $searchRequest = $request->search_request;

            $query->where(function ($q) use ($searchRequest) {
                $q->where('nama_usaha', 'like', "%{$searchRequest}%")
                  ->orWhereHas('pelanggan', function ($q2) use ($searchRequest) {
                    $q2->where('nama_pelanggan', 'like', "%{$searchRequest}");
                  });
            });
        }
        // Filter
        if ($request->filled('status_request')) {
            $query->where('status_request', $request->status_request);
        }
        // Sorting
        $sortBy     = $request->input('sort_by', 'created_at');
        $sortOrder  = $request->input('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $requestMitras = $query->latest()->simplePaginate(6)->withQueryString();

        return view('/admin.request_mitra.index', [
            'requestMitras' => $requestMitras,
            'sortBy'        => $sortBy,
            'sortOrder'    => $sortOrder,
        ]);
    }
    */

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

    // Action
    public function accept(Requestmitra $requestMitra)
    {
        DB::transaction(function () use ($requestMitra) {
            $requestMitra->update(['status_request' => 'Diterima']);

            // Cek apakah kerjasama untuk request_mitra ini sudah ada
            $kerjasamaExists = Kerjasama::where('request_mitra_id', $requestMitra->id)->exists();

            if (! $kerjasamaExists) {
                Kerjasama::create([
                'request_mitra_id'  => $requestMitra->id,
                'noTelp_usaha'      => null,
                'email_usaha'       => null,
                'alamat_usaha'      => null,
                'harga01'           => null,
                'ket_harga01'       => null,
                'harga02'           => null,
                'ket_harga02'       => null,
                ]);
            }
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
