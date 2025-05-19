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
        $pesanans = Auth::user()->pesanan()->with('pelanggan', 'paketPernikahan', 'pembayaran')->latest()->get(); // It's fine, it's just VS Code don't have the extension for it

        return view('customer.pesanan.index', [
            'pesanans' => $pesanans,
        ]);
    }

    public function create(Request $request)
    {
        $paketId            = $request->query('paket_id');
        $pelanggans         = Auth::user()->pelanggan;
        $hasPelanggan       = $pelanggans->isNotEmpty();
        $paketPernikahans   = PaketPernikahan::where('status_paket', 'Tersedia')->latest()->get();

        return view('customer.pesanan.create', [
            'paket_id'          => $paketId,
            'pelanggans'        => $pelanggans,
            'hasPelanggan'      => $hasPelanggan,
            'paketPernikahans'  => $paketPernikahans,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pelanggan_id'          => ['required', 'exists:pelanggan,id'],
            'paket_pernikahan_id'   => ['nullable', 'exists:paket_pernikahan,id'],

            'pengantin_pria'        => ['required'],
            'pengantin_wanita'      => ['required'],
            'tanggal_acara'         => ['required', 'date'],
            'tanggal_diskusi'       => ['required', 'date'],
        ]);

        $validatedData['tgl_pesanan'] = now();

        if ($validatedData['paket_pernikahan_id']) {
            $paket = PaketPernikahan::findOrFail($validatedData['paket_pernikahan_id']);
            $validatedData['total_harga_pesanan'] = $paket->hargaLunas_paket;
        } else {
            $validatedData['total_harga_pesanan'] = null;
        }

        Pesanan::create($validatedData);
        
        return redirect()->route('home');
    }

    public function show(Pesanan $pesanan)
    {
        $this->authorize('view', $pesanan);
        return view('customer.pesanan.show', compact('pesanan'));
    }

    public function edit(Pesanan $pesanan)
    {
        /*
        $this->authorize('update', $pesanan);

        $paketPernikahans = PaketPernikahan::where('status_paket', 'Tersedia')
            ->orWhere(function ($query) {
                $query->where('status_paket', 'Eksklusif')
                    ->where('custom_paket_for', Auth::id());
            })->get();

        return view('customer.pesanan.edit', 
            compact('pesanan', 'paketPernikahans')
        );
        */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        /*
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
        */
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
