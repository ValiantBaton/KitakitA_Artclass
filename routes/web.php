<?php

use App\Http\Controllers\UserController;
// use App\Http\Controllers\PengajarController;
// use App\Http\Controllers\MuridController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Halaman utama
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => \Illuminate\Foundation\Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route untuk Admin & Pengelola
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin,pengelola'])
    ->group(function () {
        Route::resource('users', UserController::class);
    });

// Route untuk Pengajar
// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:pengajar'])
//     ->group(function () {
//         Route::get('/pengajar/dashboard', [PengajarController::class, 'index'])->name('pengajar.dashboard');
//     });

// Route untuk Murid
// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:murid'])
//     ->group(function () {
//         Route::get('/murid/dashboard', [MuridController::class, 'index'])->name('murid.dashboard');
//     });

// Dashboard Umum (untuk semua user yang login)
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');
    });
