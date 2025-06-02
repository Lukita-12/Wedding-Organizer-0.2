<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        // Eager loading!
        $pembayarans = Pembayaran::with('pesanan.pelanggan', 'pesanan.paketPernikahan')->latest()->simplePaginate(6);

        return view('admin.pembayaran.index', [
            'pembayarans' => $pembayarans,
        ]);
    }

    public function create()
    {
        $pesanans = Pesanan::with('pelanggan', 'paketPernikahan')->latest()->get();

        return view('admin.pembayaran.create', [
            'pesanans' => $pesanans,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pesanan_id'            => ['required', 'exists:pesanan,id'],
            'tgl_pembayaran'        => ['required', 'date'],
            'bukti_pembayaran_dp'   => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'bukti_pembayaran_lunas'=> ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'bayar_dp'              => ['required', 'in:Belum dibayar,Sudah dibayar'],
            'bayar_lunas'           => ['required', 'in:Belum dibayar,Sudah dibayar'],
        ]);

        // Simpan file ke storage dan ambil path-nya
        $validatedData['bukti_pembayaran_dp']   = $request->file('bukti_pembayaran_dp')->store('images/bukti_pembayaran/dp', 'public');
        $validatedData['bukti_pembayaran_lunas']= $request->file('bukti_pembayaran_lunas')->store('images/bukti_pembayaran/lunas', 'public');

        Pembayaran::create($validatedData);

        return redirect()->route('admin.pembayaran.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    public function edit(Pembayaran $pembayaran)
    {
        $pesanans = Pesanan::with('pelanggan', 'paketPernikahan')->latest()->get();

        return view('admin.pembayaran.edit', [
            'pembayaran'=> $pembayaran,
            'pesanans'  => $pesanans,
        ]);
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $validatedData = $request->validate([
            'pesanan_id'            => ['required', 'exists:pesanan,id'],
            'tgl_pembayaran'        => ['required', 'date'],
            'bukti_pembayaran_dp'   => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'bukti_pembayaran_lunas'=> ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'bayar_dp'              => ['required', 'in:Belum dibayar,Sudah dibayar'],
            'bayar_lunas'           => ['required', 'in:Belum dibayar,Sudah dibayar'],
        ]);

        if ($request->hasFile('bukti_pembayaran_dp')) {
            $validatedData['bukti_pembayaran_dp']   = $request->file('bukti_pembayaran_dp')->store('images/bukti_pembayaran/dp', 'public');
        } else {
            $validatedData['bukti_pembayaran_dp']   = $pembayaran->bukti_pembayaran_dp;
        }
        if ($request->hasFile('bukti_pembayaran_lunas')) {
            $validatedData['bukti_pembayaran_lunas']= $request->file('bukti_pembayaran_lunas')->store('images/bukti_pembayaran/lunas', 'public');
        } else {
            $validatedData['bukti_pembayaran_lunas']= $pembayaran->bukti_pembayaran_lunas;
        }

        $pembayaran->update($validatedData);

        return redirect()->route('admin.pembayaran.index');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()->route('admin.pembayaran.index');
    }

    // Search
    public function search(Request $request)
    {
        $search = $request->input('search');

        $pembayarans = Pembayaran::when($search, function ($query, $search) {
            $query->whereHas('pesanan.pelanggan', function ($subQurey) use ($search) {
                $subQurey->where('nama_pelanggan', 'like', '%' . $search . '%');
            });
        })->latest()->simplePaginate(6);

        return view('admin.pembayaran.index', [
            'pembayarans' => $pembayarans,
        ]);
    }
}
