<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\PaketPernikahan;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Spatie\Browsershot\Browsershot;

class PaketPernikahanController extends Controller
{
    public function preview()
    {
        $paketPernikahans = PaketPernikahan::with([
            'venueUsaha.requestMitra', 'dekorasiUsaha.requestMitra', 'tataRiasUsaha.requestMitra',
            'cateringUsaha.requestMitra', 'kuePernikahanUsaha.requestMitra', 'fotograferUsaha.requestMitra',
            'entertainmentUsaha.requestMitra', 'user'
        ])->latest()->simplePaginate(6);

        return view('laporan.paket_pernikahan.print', [
            'paketPernikahans' => $paketPernikahans,
        ]);
    }

    public function exportPdf()
    {
        $currentPage = request()->get('page', 1); // default ke halaman 1 jika tidak ada
        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });

        $paketPernikahans = PaketPernikahan::with([
            'venueUsaha.requestMitra', 'dekorasiUsaha.requestMitra', 'tataRiasUsaha.requestMitra',
            'cateringUsaha.requestMitra', 'kuePernikahanUsaha.requestMitra', 'fotograferUsaha.requestMitra',
            'entertainmentUsaha.requestMitra', 'user'
        ])->latest()->simplePaginate(6);

        $html = view('laporan.paket_pernikahan.print', [
            'paketPernikahans' => $paketPernikahans,
        ])->render();

        $folderPath = storage_path('app/public/laporan/paket_pernikahan');
        $pdfPath = $folderPath . '/paket_pernikahan.pdf';
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true); // true = recursive
        }

        Browsershot::html($html)
            ->paperSize(8.27, 13) // ukuran F4 dalam inch: lebar x tinggi
            ->landscape()         // hapus ini jika ingin potret (portrait)
            ->margins(0, 0, 0, 0)
            ->showBackground()
            ->savePdf($pdfPath);

        return response()->download($pdfPath);
    }
}
