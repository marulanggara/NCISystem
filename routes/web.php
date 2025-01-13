<?php

use App\Http\Controllers\CrewController;
use App\Http\Controllers\ExperienceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/', [CrewController::class, 'index'])->name('dashboard');
    Route::resource('crews', CrewController::class);
});
