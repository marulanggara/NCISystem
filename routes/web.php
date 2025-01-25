<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route untuk halaman login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcces'])->name('login.process');

// Route yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    // Route halaman dashboard
    Route::get('/dashboard', [CrewController::class, 'index'])->name('dashboard');
    Route::get('/crews/search', [CrewController::class, 'search'])->name('crews.search');
    Route::resource('crews', CrewController::class);

    // Route halaman admin profile
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');

    // Route logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
