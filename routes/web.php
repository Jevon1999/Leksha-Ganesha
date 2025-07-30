<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('index');
});

//DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('show.dashboard');

//AUTH
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

//FITUR
Route::get('/formTambahBerita', [DashboardController::class, 'formBerita'])->name('form.berita');

