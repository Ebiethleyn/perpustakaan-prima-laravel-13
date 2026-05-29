<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanSiswaController extends Controller
{
    /**
     * Tampilan Katalog Buku untuk Siswa + Riwayat Pinjaman Mereka
     */
    public function index()
    {
        // 1. Ambil semua koleksi buku beserta kategorinya untuk dipilih siswa
        $daftarBuku = Buku::with('kategori')->get();

        // 2. Ambil riwayat peminjaman khusus untuk siswa yang sedang login saat ini
        // Menggunakan UserId (U & I kapital) sesuai database asli kamu
        $riwayatPinjam = Peminjaman::with('buku')
            ->where('UserId', Auth::user()->UserId ?? Auth::id())
            ->latest()
            ->get();

        return view('siswa.dashboard', compact('daftarBuku', 'riwayatPinjam'));
    }

    /**
     * Proses pengajuan klaim pinjam buku oleh siswa
     */
    public function ajukanPinjam(Request $request)
    {
        $request->validate([
            'bukuId' => 'required|numeric'
        ]);

        // Masukkan data transaksi baru ke tabel 'peminjam'
        Peminjaman::create([
            'UserId'            => Auth::user()->UserId ?? Auth::id(), // ID Siswa yang login
            'BukuId'            => $request->bukuId,
            'tanggalPeminjaman' => now()->toDateString(), // Hari ini
            'TanggalPengembalian' => null, // Belum dikembalikan
            'status'            => 'Dipinjam' // Otomatis berstatus dipinjam
        ]);

        return redirect()->back()->with('success', 'Buku berhasil dipinjam! Silakan ambil bukunya di meja petugas perpus.');
    }
}
