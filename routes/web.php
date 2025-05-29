<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', [HomeController::class, 'index'])->name('home');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/customer.php';
require __DIR__ . '/report.php';