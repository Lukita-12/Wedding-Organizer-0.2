<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\RequestMitra;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Spatie\Browsershot\Browsershot;

class RequestMitraController extends Controller
{
    public function preview()
    {
        $requestMitras = RequestMitra::with('pelanggan')->latest()->simplePaginate(6);

        return view('laporan.request_mitra.print', [
            'requestMitras' => $requestMitras,
        ]);
    }

    public function print(Request $request)
    {
        $currentPage = $request->input('page', 1);

        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });

        $html = view('laporan.request_mitra.print', [
            'requestMitras' => RequestMitra::with('pelanggan')->latest()->simplePaginate(6),
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
