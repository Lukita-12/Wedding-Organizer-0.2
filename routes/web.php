<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KerjasamaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/home', 'home')->name('home');
Route::view('/form-desain', 'form-desain');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/customer.php';