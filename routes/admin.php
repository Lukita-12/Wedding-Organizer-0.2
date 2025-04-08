<?php

use App\Http\Controllers\Admin\KerjasamaController;
use App\Http\Controllers\Admin\RequestMitraController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::controller(RequestMitraController::class)->group(function () {
        Route::get('/request-mitra', 'index')->name('admin.request_mitra.index');
        Route::get('/request-mitra/{requestMitra}', 'show')->name('admin.request_mitra.show');
        Route::put('/request-mitra/{requestMitra}/accept', 'accept')->name('admin.request_mitra.accept');
        Route::put('/request-mitra/{requestMitra}/reject', 'reject')->name('admin.request_mitra.reject');
    });

    Route::controller(KerjasamaController::class)->group(function () {
        Route::get('/kerjasama', 'index')->name('admin.kerjasama.index');
        Route::get('/kerjasama/{kerjasama}', 'show')->name('admin.kerjasama.show');
        Route::get('/kerjasama/{kerjasama}/edit', 'edit')->name('admin.kerjasama.edit');
        Route::put('/kerjasama/{kerjasama}', 'update')->name('admin.kerjasama.update');
    });
});