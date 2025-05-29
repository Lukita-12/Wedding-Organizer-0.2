<?php

use App\Http\Controllers\Laporan\RequestMitraController;
use Illuminate\Support\Facades\Route;

Route::prefix('laporan')->group(function () {
    Route::controller(RequestMitraController::class)->group(function () {
        Route::get('/request-mitra', 'index')->name('laporan.request_mitra.index');
    });
});