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
    public function preview()
    {
        $pesanans = Pesanan::with('pelanggan', 'paketPernikahan')->latest()->simplePaginate(6);

        return view('laporan.pesanan.preview', [
            'pesanans' => $pesanans,
        ]);
    }

    public function print(Request $request)
    {
        $currentPage = $request->input('page', 1);

        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });

        $html = view('laporan.pesanan.preview', [
            'pesanans' => Pesanan::with('pelanggan', 'paketPernikahan')->latest()->simplePaginate(6)
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


    /*
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
    */
}
