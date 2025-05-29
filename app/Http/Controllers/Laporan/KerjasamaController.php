<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class KerjasamaController extends Controller
{
    public function index()
    {
        $kerjasamas = Kerjasama::with('requestMitra')->latest()->simplePaginate(5);

        return view('laporan.kerjasama.index', [
            'kerjasamas' => $kerjasamas,
        ]);
    }

    public function printPreview()
    {
        $kerjasamas = Kerjasama::with('requestMitra')->latest()->get();

        return view('laporan.kerjasama.print', [
            'kerjasamas' => $kerjasamas,
        ]);
    }

    public function exportPdf()
    {
        $html = view('laporan.kerjasama.print', [
            'kerjasamas' => Kerjasama::with('requestMitra')->latest()->simplePaginate(5)
        ])->render();

        $pdfPath = storage_path('app/public/laporan/kerjasama/kerjasama.pdf');

        Browsershot::html($html)
            ->format('A4')
            ->landscape()
            ->margins(0, 0, 0, 0)
            ->showBackground()
            ->savePdf($pdfPath);

        return response()->download($pdfPath);
    }
}
