<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
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

    public function exportPdf()
    {
        $currentPage = request()->get('page', 1); // default ke halaman 1 jika tidak ada
        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });
        
        $pembayarans = Pembayaran::with('pesanan')->latest()->simplePaginate(6);

        $html = view('laporan.pembayaran.print', [
            'pembayarans' => $pembayarans,
        ])->render();

        $folderPath = storage_path('app/public/laporan/pembayaran');
        $pdfPath = $folderPath . '/pembayaran.pdf';
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true); // true = recursive
        }

        Browsershot::html($html)
            ->Browsershot('A4')
            ->landscape()
            ->margins(0, 0, 0, 0)
            ->showBackground()
            ->savePdf($pdfPath);

        return response()->download($pdfPath);
    }
}
