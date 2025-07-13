<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GambarPromosi;
use App\Models\Kerjasama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GambarPromosiController extends Controller
{
    public function index(Kerjasama $kerjasama)
    {
        return view('admin.gambar_promosi.index', [
            'kerjasama' =>  $kerjasama,
            'gambarPromosi' => $kerjasama->gambarPromosi,
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
    public function show(GambarPromosi $gambarPromosi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GambarPromosi $gambarPromosi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GambarPromosi $gambarPromosi)
    {
        //
    }

    public function destroy(GambarPromosi $gambarPromosi)
    {
        // Hapus file dari storage
        if (Storage::disk('public')->exists($gambarPromosi->file_path)) {
            Storage::disk('public')->delete($gambarPromosi->file_path);
        }

        // Hapus data di database
        $gambarPromosi->delete();

        return back()->with('success', 'Gambar promosi berhasil dihapus.');
    }
}
