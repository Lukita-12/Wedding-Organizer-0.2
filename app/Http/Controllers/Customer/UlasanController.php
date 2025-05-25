<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ulasans = Ulasan::with('user')->latest()->get();

        return view('customer.ulasan.index', [
            'ulasans' => $ulasans,
        ]);
    }

    public function create()
    {
        return view('customer.ulasan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'upload_file'   => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'ulasan'        => ['required'],
        ]);

        $validatedData['user_id']       = Auth::id();
        $validatedData['upload_file']   = $request->file('upload_file')->store('images/ulasan/images', 'public');

        Ulasan::create($validatedData);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ulasan $ulasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ulasan $ulasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ulasan $ulasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ulasan $ulasan)
    {
        //
    }
}
