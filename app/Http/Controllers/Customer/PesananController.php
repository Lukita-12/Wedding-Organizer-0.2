<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\PaketPernikahan;
use App\Models\Pesanan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $pesanans = Pesanan::with('paketPernikahan')
                ->where('user_id', Auth::id())
                ->latest()
                ->get();

        return view('/customer.pesanan.index', compact('pesanans'));
    }

    public function create(Request $request)
    {
        $paketId = $request->query('paket-pernikahan');
        $selectedPaket = null;

        if ($paketId) {
            $selectedPaket = PaketPernikahan::findOrFail($paketId); // akan throw 404 kalau tidak ada
            $this->authorize('view', $selectedPaket); // cek akses ke paket (eksklusif/tidak)   
        }

        return view('/customer.pesanan.create', [
            'selectedPaket' => $selectedPaket,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'paket_pernikahan_id'   => ['nullable', 'exists:paket_pernikahan,id',],
            'pengantin_pria'        => ['required'],
            'pengantin_wanita'      => ['required'],
            'tanggal_acara'         => ['required', 'date'],
            'tanggal_diskusi'       => ['required', 'date'],
        ]);

        // Isi otomatis
        $validatedData['user_id'] = Auth::id();
        $validatedData['tgl_pesanan'] = now();

        // Jika customer memilih paket, ambil harga dari paket tersebut
        if ($request->filled('paket_pernikahan_id')) {
            $paket = PaketPernikahan::findOrFail($request->paket_pernikahan_id);
            $validatedData['total_harga_pesanan'] = $paket->hargaLunas_paket;
        } else {
            $validatedData['total_harga_pesanan'] = 0;
        }
        
        Pesanan::create($validatedData);

        return redirect('/');
    }

    public function show(Pesanan $pesanan)
    {
        $this->authorize('view', $pesanan);
        return view('customer.pesanan.show', compact('pesanan'));
    }

    public function edit(Pesanan $pesanan)
    {
        $this->authorize('update', $pesanan);

        $paketPernikahans = PaketPernikahan::where('status_paket', 'Tersedia')
            ->orWhere(function ($query) {
                $query->where('status_paket', 'Eksklusif')
                    ->where('custom_paket_for', Auth::id());
            })->get();

        return view('customer.pesanan.edit', 
            compact('pesanan', 'paketPernikahans')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        // Pastikan user hanya bisa update pesanan miliknya
        $this->authorize('update', $pesanan);

        $validated = $request->validate([
            'pengantin_pria'        => ['required', 'string'],
            'pengantin_wanita'      => ['required', 'string'],
            'tanggal_acara'         => ['required', 'date'],
            'tanggal_diskusi'       => ['nullable', 'date'],
            'paket_pernikahan_id'   => ['nullable', 'exists:paket_pernikahan,id'],
        ]);

        $pesanan->update($validated);

        return redirect()->route('customer.pesanan.index')->with('success', 'Pesanan berhasil diperbarui.');
    }

    // Cancel
    public function destroy(Pesanan $pesanan)
    {
        $this->authorize('delete', $pesanan); // sama seperti validasi edit

        if ($pesanan->status_pesanan === 'Dikonfirmasi') {
            return back()->with('error', 'Pesanan sudah dikonfirmasi dan tidak dapat dibatalkan.');
        }

        $pesanan->update([
            'status_pesanan' => 'Dibatalkan',
        ]);

        return redirect()
            ->route('customer.pesanan.index')
            ->with('success', 'Pesanan berhasil dibatalkan.');
    }
}
