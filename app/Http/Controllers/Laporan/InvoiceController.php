<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function preview(Pembayaran $pembayaran)
    {
        $pesanan    = $pembayaran->pesanan;
        $pelanggan  = $pesanan?->pelanggan;
        $user       = $pelanggan?->user;

        if (!$pesanan || !$pelanggan || !$user) {
            return back()->with('error', 'Data invoice tidak lengkap!');
        };

        return view('laporan.invoice.print', [
            'user'      => $user,
            'pesanan'   => $pesanan,
            'pelanggan' => $pelanggan,
            'pembayaran'=> $pembayaran,
        ]);
    }
}
