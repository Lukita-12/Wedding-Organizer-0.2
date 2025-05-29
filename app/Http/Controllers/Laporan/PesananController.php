<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Spatie\Browsershot\Browsershot;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with('pelanggan', 'paketPernikahan')->latest()->simplePaginate(6);

        return view('laporan.pesanan.index', [
            'pesanans' => $pesanans,
        ]);
    }

    public function preview()
    {
        $pesanans = Pesanan::with('pelanggan', 'paketPernikahan')->latest()->simplePaginate(6);

        return view('laporan.pesanan.print', [
            'pesanans' => $pesanans,
        ]);
    }

    public function exportPdf()
    {
        $currentPage = request()->get('page', 1); // default ke halaman 1 jika tidak ada
        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });
        
        $pesanans = Pesanan::with('pelanggan', 'paketPernikahan')->latest()->simplePaginate(6);

        $html = view('laporan.pesanan.print', [
            'pesanans' => $pesanans,
        ])->render();

        $folderPath = storage_path('app/public/laporan/pesanan');
        $pdfPath = $folderPath . '/pesanan.pdf';
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true); // true = recursive
        }

        Browsershot::html($html)
            ->format('A4')
            ->landscape()
            ->margins(0, 0, 0, 0)
            ->showBackground()
            ->savePdf($pdfPath);

        return response()->download($pdfPath);
    }
}
