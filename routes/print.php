<?php

use App\Http\Controllers\Laporan\PaketPernikahanController;
use App\Http\Controllers\Laporan\PesananController;
use Illuminate\Support\Facades\Route;

Route::prefix('print')->group(function () {
    Route::controller(PesananController::class)->group(function () {
        Route::get('/pesanan/preview', 'preview')->name('laporan.pesanan.preview');        
        Route::get('/pesanan/printed', 'print')->name('laporan.pesanan.print');
    });

    Route::controller(PaketPernikahanController::class)->group(function () {
        Route::get('/paket-pernikahan/preview', 'preview')->name('paket_pernikahan.preview');
        Route::get('/paket-pernikahan/printed', 'print')->name('paket_pernikahan.print');
    });
});