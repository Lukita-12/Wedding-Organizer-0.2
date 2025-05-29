<?php

use App\Http\Controllers\Laporan\KerjasamaController;
use App\Http\Controllers\Laporan\PesananController;
use App\Http\Controllers\Laporan\RequestMitraController;
use Illuminate\Support\Facades\Route;

Route::prefix('laporan')->group(function () {
    Route::controller(RequestMitraController::class)->group(function () {
        Route::get('/request-mitra/preview', 'preview')->name('laporan.request_mitra.preview');
        Route::get('/request-mitra/print', 'exportPdf')->name('laporan.request_mitra.print');
    });

    Route::controller(KerjasamaController::class)->group(function () {
        Route::get('/kerjasama', 'index')->name('laporan.kerjasama.index');
        Route::get('/kerjasama/preview', 'printPreview')->name('laporan.kerjasama.preview');
        Route::get('/kerjasama/print', 'exportPdf')->name('laporan.kerjasama.print');
    });

    Route::controller(PesananController::class)->group(function () {
        Route::get('/pesanan/preview', 'preview')->name('laporan.pesanan.preview');
        Route::get('/pesanan/print', 'exportPdf')->name('laporan.pesanan.print');
    });
});