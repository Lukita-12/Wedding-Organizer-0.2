<?php

use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\KerjasamaController;
use App\Http\Controllers\Admin\PaketPernikahanController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\RequestMitraController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::controller(RequestMitraController::class)->group(function () {
        Route::get('/request-mitra', 'index')->name('admin.request_mitra.index');
        Route::get('/request-mitra/{requestMitra}', 'show')->name('admin.request_mitra.show');

        Route::get('/request-mitra/search', 'search')->name('admin.request_mitra.search');

        Route::patch('/request-mitra/{requestMitra}/accept', 'accept')->name('admin.request_mitra.accept');
        Route::patch('/request-mitra/{requestMitra}/reject', 'reject')->name('admin.request_mitra.reject');
    });

    Route::controller(KerjasamaController::class)->group(function () {
        Route::get('/kerjasama', 'index')->name('admin.kerjasama.index');
        Route::get('/kerjasama/create', 'create')->name('admin.kerjasama.create');
        Route::post('/kerjasama/', 'store')->name('admin.kerjasama.store');
        Route::get('/kerjasama/{kerjasama}', 'show')->name('admin.kerjasama.show');
        Route::get('/kerjasama/{kerjasama}/edit', 'edit')->name('admin.kerjasama.edit');
        Route::put('/kerjasama/{kerjasama}', 'update')->name('admin.kerjasama.update');
        Route::delete('/kerjasama/{kerjasama}', 'destroy')->name('admin.kerjasama.destroy');
    });

    Route::controller(PaketPernikahanController::class)->group(function () {
        Route::get('/paket-pernikahan', 'index')->name('admin.paket_pernikahan.index');
        Route::get('/paket-pernikahan/create', 'create')->name('admin.paket_pernikahan.create');
        Route::post('/paket-pernikahan', 'store')->name('admin.paket_pernikahan.store');
        Route::get('/paket-pernikahan/{paketPernikahan}', 'show')->name('admin.paket_pernikahan.show');
        Route::get('/paket-pernikahan/{paketPernikahan}/edit', 'edit')->name('admin.paket_pernikahan.edit');
        Route::put('/paket-pernikahan/{paketPernikahan}', 'update')->name('admin.paket_pernikahan.update');
        Route::delete('/paket-pernikahan/{paketPernikahan}', 'destroy')->name('admin.paket_pernikahan.delete');
    });

    Route::controller(PesananController::class)->group(function () {
        Route::get('/pesanan', 'index')->name('admin.pesanan.index');

        Route::put('/pesanan/{pesanan}/accept', 'accept')->name('admin.pesanan.accept');
        Route::put('/pesanan/{pesanan}/reject', 'reject')->name('admin.pesanan.reject');
    });

    Route::controller(BankController::class)->group(function () {
        Route::get('/bank', 'index')->name('admin.bank.index');
        Route::get('/bank/create', 'create')->name('admin.bank.create');
        Route::post('/bank', 'store')->name('admin.bank.store');
        Route::get('/bank/{bank}/edit', 'edit')->name('admin.bank.edit');
        Route::put('/bank/{bank}', 'update')->name('admin.bank.update');
        Route::delete('/bank/{bank}', 'destroy')->name('admin.bank.destroy');
    });
});

Route::controller(PembayaranController::class)->group(function() {
    Route::get('/admin/pembayaran', 'index')->name('admin.pembayaran.index');
});