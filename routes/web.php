<?php

use App\Http\Controllers\PeminjamanSiswaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
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

// KITA MODIFIKASI BAGIAN PEMINJAM DI SINI AGAR MEMANGGIL CONTROLLER:
Route::middleware(['role:peminjam'])->group(function () {
    Route::get('/dashboard/peminjam', [PeminjamanSiswaController::class, 'index'])->name('peminjam.dashboard');
    Route::post('katalog/pinjam', [PeminjamanSiswaController::class, 'ajukanPinjam'])->name('siswa.pinjam');
});


// 4. Jalur URL CRUD Buku Khusus Administrator dan Petugas
Route::middleware(['role:administrator,petugas'])->group(function () {
    Route::resource('buku', BukuController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('peminjam', PeminjamController::class);


    // RUTE BARU SIRKULASI TRANSAKSI:
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::patch('transaksi/{id}/status', [TransaksiController::class, 'updateStatus'])->name('transaksi.status');
});
