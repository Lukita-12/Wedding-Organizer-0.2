<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Spatie\Browsershot\Browsershot;

class KerjasamaController extends Controller
{
    public function preview()
    {
        $kerjasamas = Kerjasama::with('requestMitra')->latest()->simplePaginate(6);

        return view('laporan.kerjasama.print', [
            'kerjasamas' => $kerjasamas,
        ]);
    }

    public function exportPdf()
    {
        $currentPage = request()->get('page', 1); // default ke halaman 1 jika tidak ada
        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });
        
        $kerjasamas = Kerjasama::with('requestMitra')->latest()->simplePaginate(6);

        $html = view('laporan.kerjasama.print', [
            'kerjasamas' => $kerjasamas,
        ])->render();

        $folderPath = storage_path('app/public/laporan/kerjasama');
        $pdfPath = $folderPath . '/kerjasama.pdf';
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
