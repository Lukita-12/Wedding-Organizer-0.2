<?php

use App\Http\Controllers\Laporan\InvoiceController;
use App\Http\Controllers\Laporan\KerjasamaController;
use App\Http\Controllers\Laporan\PaketPernikahanController;
use App\Http\Controllers\Laporan\PembayaranController;
use App\Http\Controllers\Laporan\PesananController;
use App\Http\Controllers\Laporan\RequestMitraController;
use Illuminate\Support\Facades\Route;

Route::prefix('print')->group(function () {
    Route::controller(RequestMitraController::class)->group(function () {
        Route::get('/request-mitra/preview', 'preview')->name('request_mitra.preview');
        Route::get('/request-mitra/printed', 'print')->name('request_mitra.print');
    });

    Route::controller(KerjasamaController::class)->group(function () {
        Route::get('/kerjasama/preview', 'preview')->name('kerjasama.preview');
        Route::get('/kerjasama/printed', 'print')->name('kerjasama.print');
    });

    Route::controller(PesananController::class)->group(function () {
        Route::get('/pesanan/preview', 'preview')->name('laporan.pesanan.preview');        
        Route::get('/pesanan/printed', 'print')->name('laporan.pesanan.print');
    });

    Route::controller(PembayaranController::class)->group(function () {
        Route::get('/pembayaran/preview', 'preview')->name('pembayaran.preview');
        Route::get('/pembayaran/printed', 'print')->name('pembayaran.print');
    });

    Route::controller(PaketPernikahanController::class)->group(function () {
        Route::get('/paket-pernikahan/preview', 'preview')->name('paket_pernikahan.preview');
        Route::get('/paket-pernikahan/printed', 'print')->name('paket_pernikahan.print');
    });

    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/invoice/{pembayaran}', 'preview')->name('invoice.preview');
    });
});