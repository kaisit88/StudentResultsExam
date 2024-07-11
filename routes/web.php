<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Student Routes
Route::get('/login', [StudentController::class, 'showLoginForm'])->name('login');
Route::post('/login', [StudentController::class, 'login']);
Route::middleware('auth:student')->group(function () {
Route::get('/results', [StudentController::class, 'results'])->name('results');
Route::post('/logout', [StudentController::class, 'logout'])->name('logout');
});

// Filament Admin Routes (handled by Filament automatically)
