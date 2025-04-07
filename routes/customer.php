<?php

use App\Http\Controllers\Customer\PelangganController;
use App\Http\Controllers\Customer\RequestMitraController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::controller(PelangganController::class)->group(function () {
        Route::get('/pelanggan', 'index')->name('customer.pelanggan.index');
        Route::get('/pelanggan/create', 'create')->name('customer.pelanggan.create');
        Route::post('/pelanggan', 'store')->name('customer.pelanggan.store');
    });

    Route::controller(RequestMitraController::class)->group(function () {
        Route::get('/request-mitra', 'index')->name('customer.request_mitra.index');
        Route::get('/request-mitra/create', 'create')->name('customer.request_mitra.create');
        Route::post('/request-mitra', 'store')->name('customer.request_mitra.store');
    });
});