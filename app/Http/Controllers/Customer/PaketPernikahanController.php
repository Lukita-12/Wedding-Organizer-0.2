<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\PaketPernikahan;
use Illuminate\Http\Request;

class PaketPernikahanController extends Controller
{
    public function index()
    {
        $paketPernikahans = PaketPernikahan::latest()->get();
        /*
        $userId = Auth::id(); // ID user yang sedang login

        $paketPernikahans = PaketPernikahan::where(function ($query) use ($userId) {
            $query->where('status_paket', 'Tersedia')
                ->orWhere(function ($sub) use ($userId) {
                    $sub->where('status_paket', 'Eksklusif')
                    ->where('custom_paket_for', $userId);
                });
        })->get();
        */

        return view('/customer.paket_pernikahan.index', [
            'paketPernikahans' => $paketPernikahans,
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
    public function show(PaketPernikahan $paketPernikahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaketPernikahan $paketPernikahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaketPernikahan $paketPernikahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaketPernikahan $paketPernikahan)
    {
        //
    }
}
