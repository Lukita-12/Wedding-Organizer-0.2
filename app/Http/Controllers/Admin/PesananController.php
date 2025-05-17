<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketPernikahan;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with(['pelanggan', 'paketPernikahan'])->latest()->simplePaginate(6);

        return view('admin.pesanan.index', compact('pesanans'));
    }

    public function create()
    {
        $pelanggans         = Pelanggan::with('user')->latest()->get();
        $paketPernikahans   = PaketPernikahan::whereIn('status_paket', ['Tersedia', 'Eksklusif'])->latest()->get();

        return view('admin.pesanan.create', [
            'pelanggans'        => $pelanggans,
            'paketPernikahans'  => $paketPernikahans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pelanggan_id'          => ['required', 'exists:pelanggan,id'],
            'paket_pernikahan_id'   => ['nullable', 'exists:paket_pernikahan,id'],

            'tgl_pesanan'           => ['required', 'date'],
            'pengantin_pria'        => ['required'],
            'pengantin_wanita'      => ['required'],
            'tanggal_acara'         => ['required', 'date'],
            'tanggal_diskusi'       => ['required', 'date'],
            'total_harga_pesanan'   => ['required'],
            'status_pesanan'        => ['required'],
        ]);

        $validatedData['total_harga_pesanan'] = str_replace(['.', ','], ['', '.'], $validatedData['total_harga_pesanan']);  //Remove seperator(. or ,)
        $validatedData['total_harga_pesanan'] = number_format((float) $validatedData['total_harga_pesanan'], 2, '.', '');   // Conver to decimal

        Pesanan::create($validatedData);

        return redirect()->route('admin.pesanan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        dd('Hello!');
    }

    public function edit(Pesanan $pesanan)
    {
        $pelanggans         = Pelanggan::with('user')->latest()->get();
        $paketPernikahans   = PaketPernikahan::whereIn('status_paket', ['Tersedia', 'Eksklusif'])->latest()->get();

        return view('admin.pesanan.edit', [
            'pesanan'           => $pesanan,
            'pelanggans'        => $pelanggans,
            'paketPernikahans'  => $paketPernikahans,
        ]);
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        $validatedData = $request->validate([
            'pelanggan_id'          => ['required', 'exists:pelanggan,id'],
            'paket_pernikahan_id'   => ['nullable', 'exists:paket_pernikahan,id'],
            
            'tgl_pesanan'           => ['required', 'date'],
            'pengantin_pria'        => ['required'],
            'pengantin_wanita'      => ['required'],
            'tanggal_acara'         => ['required', 'date'],
            'tanggal_diskusi'       => ['required', 'date'],
            'total_harga_pesanan'   => ['required'],
            'status_pesanan'        => ['required'],
        ]);

        $validatedData['total_harga_pesanan'] = str_replace(['.', ','], ['', '.'], $validatedData['total_harga_pesanan']);  //Remove seperator(. or ,)
        $validatedData['total_harga_pesanan'] = number_format((float) $validatedData['total_harga_pesanan'], 2, '.', '');   // Conver to decimal

        $pesanan->update($validatedData);

        return redirect()->route('admin.pesanan.index');
    }

    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();

        return redirect()->route('admin.pesanan.index');
    }

    // Search
    public function search(Request $request)
    {
        $search = $request->input('search');

        $pesanans = Pesanan::with('pelanggan')
            ->when($search, function ($query, $search) {
                $query->whereHas('pelanggan', function ($subQuery) use ($search) {
                    $subQuery->where('nama_pelanggan', 'like', '%' . $search . '%');
                });
            })->latest()->simplePaginate(6);

        return view('admin.pesanan.index', [
            'pesanans' => $pesanans,
        ]);
    }

    // Filter
    public function filter(Request $request)
    {
        $filterStatus = $request->input('status_pesanan');

        $pesanans = Pesanan::with('pelanggan', 'paketPernikahan')
            ->when($filterStatus, function($query, $filterStatus) {
                return $query->where('status_pesanan', $filterStatus);
            })->latest()->simplePaginate(6);

        return view('admin.pesanan.index', [
            'pesanans' => $pesanans,
        ]);
    }

    // Action
    public function accept(Pesanan $pesanan)
    {
        if ($pesanan->pembayaran) {
            return redirect()->back()->with('warning', 'Pesanan ini sudah memiliki data pembayaran!');
        }
        DB::transaction(function () use ($pesanan) {
            $pesanan->update(['status_pesanan' => 'Diterima']);
        });

        Pembayaran::create([
            'pesanan_id' => $pesanan->id,
        ]);

        return redirect()->route('admin.pesanan.index');
    }

    public function reject(Pesanan $pesanan)
    {
        $pesanan->update([
            'status_pesanan' => 'Dibatalkan',
        ]);

        return redirect()
            ->route('admin.pesanan.index')
            ->with('success', 'Pesanan berhasil di-tolak/batalkan!');
    }
}
