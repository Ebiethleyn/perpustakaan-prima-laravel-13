<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // <-- Tambahkan baris ini untuk mengusir garis merah!

// 1. Jalur URL Halaman Utama (Alihkan langsung ke halaman login)
Route::get('/', function () {
    return redirect('/login');
});

// 2. Jalur URL Fitur Autentikasi (Menggunakan AuthController)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// 3. Jalur URL Dashboard Mandiri yang Sudah Terkunci Aman (Menggunakan Middleware)
// 3. Jalur URL Dashboard Mandiri yang Sudah Terkunci Aman (Menggunakan View Dashboard)
Route::middleware(['role:administrator'])->group(function () {
    Route::get('/dashboard/admin', function () {
        return view('dashboard.admin');
    });
});

Route::middleware(['role:petugas'])->group(function () {
    Route::get('/dashboard/petugas', function () {
        return view('dashboard.petugas');
    });
});

Route::middleware(['role:peminjam'])->group(function () {
    Route::get('/dashboard/peminjam', function () {
        return view('dashboard.peminjam');
    });
});


// 4. Jalur URL CRUD Buku Khusus Administrator dan Petugas
Route::middleware(['role:administrator,petugas'])->group(function () {
    Route::resource('buku', BukuController::class);
});
