@extends('layouts.app')

@section('title', 'Dashboard Peminjam')

@section('content')
    <div style="background-color: #2d2d2d; padding: 20px; border-radius: 8px; border-left: 5px solid #ff2d20;">
        <h1 style="margin: 0; color: #ff2d20;">Selamat Datang di Perpustakaan!</h1>
        <p style="color: #ccc; margin-top: 10px;">Halo <strong>{{ Auth::user()->namaLengkap }}</strong>, mau membaca buku apa
            hari ini? Jelajahi ribuan koleksi digital kami.</p>
    </div>

    <!-- Informasi Aktivitas Membaca Siswa -->
    <div style="margin-top: 25px; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
        <div style="background: #333; padding: 20px; border-radius: 8px; text-align: center;">
            <span style="display: block; font-size: 24px; font-weight: bold; color: #ff2d20;">2</span>
            <span style="color: #888; font-size: 14px;">Buku Sedang Dipinjam</span>
        </div>
        <div style="background: #333; padding: 20px; border-radius: 8px; text-align: center;">
            <span style="display: block; font-size: 24px; font-weight: bold; color: #ff2d20;">5</span>
            <span style="color: #888; font-size: 14px;">Koleksi Buku Favorit</span>
        </div>
        <div style="background: #333; padding: 20px; border-radius: 8px; text-align: center;">
            <span style="display: block; font-size: 24px; font-weight: bold; color: #00ffcc;">14 Hari</span>
            <span style="color: #888; font-size: 14px;">Sisa Batas Waktu</span>
        </div>
    </div>
@endsection
