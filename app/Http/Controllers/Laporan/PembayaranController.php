<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Spatie\Browsershot\Browsershot;

class PembayaranController extends Controller
{
    public function preview()
    {
        $pembayarans = Pembayaran::with('pesanan.pelanggan', 'pesanan.paketPernikahan')->latest()->simplePaginate(6);

        return view('laporan.pembayaran.print', [
            'pembayarans' => $pembayarans,
        ]);
    }

    public function print(Request $request)
    {
        $currentPage = $request->input('page', 1);

        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });

        $html = view('laporan.pembayaran.print', [
            'pembayarans' => Pembayaran::with('pesanan.pelanggan', 'pesanan.paketPernikahan')->latest()->simplePaginate(6),
        ])->render();

        $pdf = Browsershot::html($html)
            ->paperSize(210, 330) // F4 ukuran dalam mm
            ->margins(10, 10, 10, 10)
            ->landscape()
            ->showBackground()
            ->pdf();

        return response($pdf)
            ->header('Content-Type', 'application/pdf');
    }
}
