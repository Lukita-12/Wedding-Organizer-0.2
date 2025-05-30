<?php

use App\Http\Controllers\Laporan\InvoiceController;
use App\Http\Controllers\Laporan\KerjasamaController;
use App\Http\Controllers\Laporan\PaketPernikahanController;
use App\Http\Controllers\Laporan\PembayaranController;
use App\Http\Controllers\Laporan\PesananController;
use App\Http\Controllers\Laporan\RequestMitraController;
use Illuminate\Support\Facades\Route;

Route::prefix('laporan')->group(function () {
    Route::controller(RequestMitraController::class)->group(function () {
        Route::get('/request-mitra/preview', 'preview')->name('laporan.request_mitra.preview');
        Route::get('/request-mitra/print', 'exportPdf')->name('laporan.request_mitra.print');
    });

    Route::controller(KerjasamaController::class)->group(function () {
        Route::get('/kerjasama/preview', 'preview')->name('laporan.kerjasama.preview');
        Route::get('/kerjasama/print', 'exportPdf')->name('laporan.kerjasama.print');
    });

    Route::controller(PesananController::class)->group(function () {
        Route::get('/pesanan/preview', 'preview')->name('laporan.pesanan.preview');
        Route::get('/pesanan/print', 'exportPdf')->name('laporan.pesanan.print');
    });

    Route::controller(PembayaranController::class)->group(function () {
        Route::get('/pembayaran/preview', 'preview')->name('laporan.pembayaran.preview');
        Route::get('/pembayaran/print', 'exportPdf')->name('laporan.pembayaran.print');
    });

    Route::controller(PaketPernikahanController::class)->group(function () {
        Route::get('/paket-pernikahan/preview', 'preview')->name('laporan.paket_pernikahan.preview');
        Route::get('/paket-pernikahan/print', 'exportPdf')->name('laporan.paket_pernikahan.print');
    });

    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/invoice/{pembayaran}', 'preview')->name('laporan.invoice.preview');
    });
});