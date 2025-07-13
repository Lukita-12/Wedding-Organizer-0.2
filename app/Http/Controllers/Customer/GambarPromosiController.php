<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\GambarPromosi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GambarPromosiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GambarPromosi $gambarPromosi)
    {
        if (Storage::disk('public')->exists($gambarPromosi->file_path)) {
            Storage::disk('public')->delete($gambarPromosi->file_path);
        }

        $gambarPromosi->delete();

        return response()->json(['success' => true]);
    }
}
