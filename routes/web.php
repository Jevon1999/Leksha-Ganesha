<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


Route::get('/', [DashboardController::class, 'showLandingPage']);


//AUTH
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.process');









Route::middleware('auth')->group(function () {

    
    //DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('show.dashboard');
    
    
    
    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    
    
    //FITUR
    Route::get('/formTambahBerita', [DashboardController::class, 'formBerita'])->name('form.berita');
    
    
    
    
    // Route untuk daftar berita dengan operasi CRUD menggunakan Livewire
    Route::get('/admin/berita', function() {
        return view('admin.berita.index');
    })->name('admin.berita.index');
    
    
});

