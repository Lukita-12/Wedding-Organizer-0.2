<?php

use App\Http\Controllers\Customer\AkunController;
use App\Http\Controllers\Customer\KerjasamaController;
use App\Http\Controllers\Customer\PaketPernikahanController;
use App\Http\Controllers\Customer\PelangganController;
use App\Http\Controllers\Customer\PembayaranController;
use App\Http\Controllers\Customer\PesananController;
use App\Http\Controllers\Customer\RequestMitraController;
use App\Http\Controllers\Customer\UlasanController;
use Illuminate\Support\Facades\Route;

Route::get('/kerjasama', [KerjasamaController::class, 'index'])->name('customer.kerjasama.index');

Route::middleware(['auth'])->group(function () {
    Route::controller(PelangganController::class)->group(function () {
        Route::get('/pelanggan', 'index')->name('customer.pelanggan.index');
        Route::get('/pelanggan/create', 'create')->name('customer.pelanggan.create');
        Route::post('/pelanggan', 'store')->name('customer.pelanggan.store');
        Route::get('/pelanggan/{pelanggan}', 'show')->name('customer.pelanggan.show');
    });

    Route::controller(RequestMitraController::class)->group(function () {
        Route::get('/request-mitra', 'index')->name('customer.request_mitra.index');
        Route::get('/request-mitra/create', 'create')->name('customer.request_mitra.create');
        Route::post('/request-mitra', 'store')->name('customer.request_mitra.store');
        Route::get('/request-mitra/{requestMitra}', 'show')->name('customer.request_mitra.show');
    });

    Route::controller(KerjasamaController::class)->group(function () {
        // Route::get('/kerjasama', 'index')->name('customer.kerjasama.index'); // No need to login to access this route
        Route::get('/kerjasama/{kerjasama}', 'show')->name('customer.kerjasama.show');
        Route::get('/kerjasama/{kerjasama}/edit', 'edit')->name('customer.kerjasama.edit');
        Route::put('/kerjasama/{kerjasama}', 'update')->name('customer.kerjasama.update');
        Route::delete('/kerjasama/{kerjasama}', 'destroy')->name('customer.kerjasama.delete');
    });

    Route::controller(PaketPernikahanController::class)->group(function () {
        Route::get('/paket-pernikahan', 'index')->name('customer.paket_pernikahan.index');
    });

    Route::controller(PesananController::class)->group(function () {
        Route::get('/pesanan', 'index')->name('customer.pesanan.index');
        Route::get('/pesanan/create', 'create')->name('customer.pesanan.create');
        Route::post('/pesanan', 'store')->name('customer.pesanan.store');
        
        Route::get('/pesanan/{pesanan}', 'show')->name('customer.pesanan.show');
        Route::get('/pesanan/{pesanan}/edit', 'edit')->name('customer.pesanan.edit');
        Route::put('/pesanan/{pesanan}', 'update')->name('customer.pesanan.update');
        Route::put('/pesanan/{pesanan}', 'destroy')->name('customer.pesanan.destroy'); // Cancel
    });

    Route::controller(PembayaranController::class)->group(function () {
        Route::get('/pembayaran/{pembayaran}/edit', 'edit')->name('customer.pembayaran.edit');
        Route::put('/pembayaran/{pembayaran}', 'update')->name('customer.pembayaran.update');
    });

    Route::controller(UlasanController::class)->group(function () {
        Route::get('/ulasan', 'index')->name('customer.ulasan.index');
        Route::get('/ulasan/create', 'create')->name('customer.ulasan.create');
        Route::post('/ulasan', 'store')->name('customer.ulasan.store');
    });

    Route::controller(AkunController::class)->group(function () {
        Route::get('/akun', 'index')->name('customer.akun.index');
        Route::get('/akun/{user}/edit', 'edit')->name('customer.akun.edit');
        Route::put('/akun/{user}', 'update')->name('customer.akun.update');
    });
});