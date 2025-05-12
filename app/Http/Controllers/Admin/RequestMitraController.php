<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use App\Models\Pelanggan;
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

    public function create()
    {
        $pelanggans = Pelanggan::latest()->get();

        return view('admin.request_mitra.create', [
            'pelanggans' => $pelanggans,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pelanggan_id'  => ['required', 'exists:pelanggan,id'],
            'nama_usaha'    => ['required'],
            'jenis_usaha'   => ['required'],
            'nama_pemilik'  => ['required'],
        ]);

        RequestMitra::create($validatedData);

        return redirect('/admin/request-mitra');
    }

    public function show(RequestMitra $requestMitra)
    {
        // Eager load customer relationship just in case
        // $requestMitra->load('pelanggan');

        return view('/admin.request_mitra.show', [
            'requestMitra' => $requestMitra,
        ]);
    }

    public function edit(RequestMitra $requestMitra)
    {
        $pelanggans = Pelanggan::latest()->get();

        return view('/admin.request_mitra.edit', [
            'requestMitra'  => $requestMitra,
            'pelanggans'    => $pelanggans,
        ]);
    }

    public function update(Request $request, RequestMitra $requestMitra)
    {
        $validatedData = $request->validate([
            'pelanggan_id'  => ['required', 'exists:pelanggan,id'],
            'nama_usaha'    => ['required'],
            'jenis_usaha'   => ['required'],
            'nama_pemilik'  => ['required'],
        ]);

        $requestMitra->update($validatedData);

        return redirect('/admin/request-mitra');
    }

    public function destroy(RequestMitra $requestMitra)
    {
        $requestMitra->delete();

        return redirect('/admin/request-mitra');
    }

    // Search
    public function search(Request $request)
    {
        $search = $request->input('search');

        $requestMitras = RequestMitra::with('pelanggan')
            ->when($search, function ($query, $search) {
                return $query->where('nama_usaha', 'like', '%' . $search . '%');
        })->simplePaginate(6);

        return view('admin.request_mitra.index', [
            'requestMitras' => $requestMitras,
        ]);
    }

    // Filter
    public function filter(Request $request)
    {
        $filterStatus = $request->input('status_request');

        $requestMitras = RequestMitra::with('pelanggan')
            ->when($filterStatus, function($query, $filterStatus) {
                $query->where('status_request', $filterStatus);
            })->simplePaginate(6);
        
        return view('admin.request_mitra.index', [
            'requestMitras' => $requestMitras,
        ]);
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
