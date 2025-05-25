<?php

use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\KerjasamaController;
use App\Http\Controllers\Admin\PaketPernikahanController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\RequestMitraController;
use App\Http\Controllers\Admin\UlasanController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::controller(PelangganController::class)->group(function () {
        Route::get('/pelanggan', 'index')->name('admin.pelanggan.index');
        Route::get('/pelanggan/create', 'create')->name('admin.pelanggan.create');
        Route::post('/pelanggan', 'store')->name('admin.pelanggan.store');
        Route::get('/pelanggan/search', 'search')->name('admin.pelanggan.search');

        Route::get('/pelanggan/{pelanggan}/edit', 'edit')->name('admin.pelanggan.edit');
        Route::put('/pelanggan/{pelanggan}', 'update')->name('admin.pelanggan.update');
        Route::delete('/pelanggan/{pelanggan}', 'destroy')->name('admin.pelanggan.destroy');
    });
    Route::controller(RequestMitraController::class)->group(function () {
        Route::get('/request-mitra', 'index')->name('admin.request_mitra.index');
        Route::get('/request-mitra/create', 'create')->name('admin.request_mitra.create');
        Route::post('/request-mitra', 'store')->name('admin.request_mitra.store');
        Route::get('/request-mitra/search', 'search')->name('admin.request_mitra.search');
        Route::get('/request-mitra/filter', 'filter')->name('admin.request_mitra.filter');

        Route::get('/request-mitra/{requestMitra}', 'show')->name('admin.request_mitra.show');
        Route::get('/request-mitra/{requestMitra}/edit', 'edit')->name('admin.request_mitra.edit');
        Route::put('/request-mitra/{requestMitra}', 'update')->name('admin.request_mitra.update');
        Route::delete('/request-mitra/{requestMitra}', 'destroy')->name('admin.request_mitra.destroy');
        Route::patch('/request-mitra/{requestMitra}/accept', 'accept')->name('admin.request_mitra.accept');
        Route::patch('/request-mitra/{requestMitra}/reject', 'reject')->name('admin.request_mitra.reject');
    });

    Route::controller(KerjasamaController::class)->group(function () {
        Route::get('/kerjasama', 'index')->name('admin.kerjasama.index');
        Route::get('/kerjasama/create', 'create')->name('admin.kerjasama.create');
        Route::post('/kerjasama/', 'store')->name('admin.kerjasama.store');
        Route::get('/kerjasama/search', 'search')->name('admin.kerjasama.search');
        
        Route::get('/kerjasama/{kerjasama}', 'show')->name('admin.kerjasama.show');
        Route::get('/kerjasama/{kerjasama}/edit', 'edit')->name('admin.kerjasama.edit');
        Route::put('/kerjasama/{kerjasama}', 'update')->name('admin.kerjasama.update');
        Route::delete('/kerjasama/{kerjasama}', 'destroy')->name('admin.kerjasama.destroy');

    });

    Route::controller(PaketPernikahanController::class)->group(function () {
        Route::get('/paket-pernikahan', 'index')->name('admin.paket_pernikahan.index');
        Route::get('/paket-pernikahan/create', 'create')->name('admin.paket_pernikahan.create');
        Route::post('/paket-pernikahan', 'store')->name('admin.paket_pernikahan.store');
        Route::get('/paket-pernikahan/search', 'search')->name('admin.paket_pernikahan.search');
        Route::get('/paket-pernikahan/filter', 'filter')->name('admin.paket_pernikahan.filter');

        Route::get('/paket-pernikahan/{paketPernikahan}', 'show')->name('admin.paket_pernikahan.show');
        Route::get('/paket-pernikahan/{paketPernikahan}/edit', 'edit')->name('admin.paket_pernikahan.edit');
        Route::put('/paket-pernikahan/{paketPernikahan}', 'update')->name('admin.paket_pernikahan.update');
        Route::delete('/paket-pernikahan/{paketPernikahan}', 'destroy')->name('admin.paket_pernikahan.destroy');
    });

    Route::controller(PesananController::class)->group(function () {
        Route::get('/pesanan', 'index')->name('admin.pesanan.index');
        Route::get('/pesanan/create', 'create')->name('admin.pesanan.create');
        Route::post('/pesanan', 'store')->name('admin.pesanan.store');
        Route::get('/pesanan/search', 'search')->name('admin.pesanan.search');
        Route::get('/pesanan/filter', 'filter')->name('admin.pesanan.filter');

        Route::get('/pesanan/{pesanan}', 'show')->name('admin.pesanan.show');
        Route::get('/pesanan/{pesanan}/edit', 'edit')->name('admin.pesanan.edit');
        Route::put('/pesanan/{pesanan}', 'update')->name('admin.pesanan.update');
        Route::delete('/pesanan/{pesanan}', 'destroy')->name('admin.pesanan.destroy');
        Route::patch('/pesanan/{pesanan}/accept', 'accept')->name('admin.pesanan.accept');
        Route::patch('/pesanan/{pesanan}/reject', 'reject')->name('admin.pesanan.reject');
    });

    Route::controller(BankController::class)->group(function () {
        Route::get('/bank', 'index')->name('admin.bank.index');
        Route::get('/bank/create', 'create')->name('admin.bank.create');
        Route::post('/bank', 'store')->name('admin.bank.store');
        Route::get('/bank/search', 'search')->name('admin.bank.search');

        Route::get('/bank/{bank}/edit', 'edit')->name('admin.bank.edit');
        Route::put('/bank/{bank}', 'update')->name('admin.bank.update');
        Route::delete('/bank/{bank}', 'destroy')->name('admin.bank.destroy');
    });

    Route::controller(AkunController::class)->group(function () {
        Route::get('/akun', 'index')->name('admin.akun.index');
        Route::get('/akun/create', 'create')->name('admin.akun.create');
        Route::post('/akun', 'store')->name('admin.akun.store');
        Route::get('/akun/search', 'search')->name('admin.akun.search');

        Route::get('/akun/{user}/edit', 'edit')->name('admin.akun.edit');
        Route::put('/akun/{user}', 'update')->name('admin.akun.update');
        Route::delete('/akun/{user}', 'destroy')->name('admin.akun.destroy');
    });

    Route::controller(PembayaranController::class)->group(function() {
        Route::get('/pembayaran', 'index')->name('admin.pembayaran.index');
        Route::get('/pembayaran/create', 'create')->name('admin.pembayaran.create');
        Route::post('/pembayaran', 'store')->name('admin.pembayaran.store');
        Route::get('/pembayaran/search', 'search')->name('admin.pembayaran.search');

        Route::get('/pembayaran/{pembayaran}/edit', 'edit')->name('admin.pembayaran.edit');
        Route::put('/pembayaran/{pembayaran}', 'update')->name('admin.pembayaran.update');
        Route::delete('/pembayaran/{pembayaran}', 'destroy')->name('admin.pembayaran.destroy');
    });

    Route::controller(UlasanController::class)->group(function () {
        Route::get('/ulasan', 'index')->name('admin.ulasan.index');
        Route::get('/ulasan/create', 'create')->name('admin.ulasan.create');
        Route::post('/ulasan', 'store')->name('admin.ulasan.store');
        Route::get('/ulasan/search', 'search')->name('admin.ulasan.search');

        Route::get('/ulasan/{ulasan}/edit', 'edit')->name('admin.ulasan.edit');
        Route::put('/ulasan/{ulasan}', 'update')->name('admin.ulasan.update');
        Route::delete('/ulasan/{ulasan}', 'destroy')->name('admin.ulasan.destroy');
    });
});
