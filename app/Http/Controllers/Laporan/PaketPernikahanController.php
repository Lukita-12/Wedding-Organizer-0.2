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

    public function print(Request $request)
    {
        $currentPage = $request->input('page', 1);

        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });

        $paketPernikahans = PaketPernikahan::with(
            'venueUsaha.requestMitra', 'dekorasiUsaha.requestMitra', 'tataRiasUsaha.requestMitra',
            'cateringUsaha.requestMitra', 'kuePernikahanUsaha.requestMitra', 'fotograferUsaha.requestMitra',
            'entertainmentUsaha.requestMitra', 'user'
        )->latest()->simplePaginate(6);

        $html = view('laporan.paket_pernikahan.print', [
            'paketPernikahans' => $paketPernikahans,
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
