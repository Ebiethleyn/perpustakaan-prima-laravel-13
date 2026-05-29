<?php

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

// 3. Kerangka Jalur URL Dashboard Mandiri untuk 3 Role
Route::get('/dashboard/admin', function () {
    return '<h1>Dashboard KHUSUS Administrator</h1><p>Selamat datang, ' . Auth::user()->namaLengkap . '</p><form action="' . route('logout') . '" method="POST">' . csrf_field() . '<button type="submit">Logout</button></form>';
});

Route::get('/dashboard/petugas', function () {
    return '<h1>Dashboard KHUSUS Petugas</h1><p>Selamat datang, ' . Auth::user()->namaLengkap . '</p><form action="' . route('logout') . '" method="POST">' . csrf_field() . '<button type="submit">Logout</button></form>';
});

Route::get('/dashboard/peminjam', function () {
    return '<h1>Dashboard Peminjam (Siswa)</h1><p>Selamat datang, ' . Auth::user()->namaLengkap . '</p><form action="' . route('logout') . '" method="POST">' . csrf_field() . '<button type="submit">Logout</button></form>';
});
