@extends('layouts.app')

@section('title', 'Dashboard Petugas')

@section('content')
    <div style="background-color: #2d2d2d; padding: 20px; border-radius: 8px; border-left: 5px solid #ff2d20;">
        <h1 style="margin: 0; color: #ff2d20;">Halo, Petugas Operasional!</h1>
        <p style="color: #ccc; margin-top: 10px;">Selamat datang kembali, <strong>{{ Auth::user()->namaLengkap }}</strong>.
            Silakan kelola aktivitas sirkulasi perpustakaan hari ini.</p>
    </div>

    <!-- Statistik Ringkas Pekerjaan Petugas -->
    <div style="margin-top: 25px; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
        <div style="background: #333; padding: 20px; border-radius: 8px; text-align: center;">
            <span style="display: block; font-size: 24px; font-weight: bold; color: #ff2d20;">12</span>
            <span style="color: #888; font-size: 14px;">Perlu Verifikasi</span>
        </div>
        <div style="background: #333; padding: 20px; border-radius: 8px; text-align: center;">
            <span style="display: block; font-size: 24px; font-weight: bold; color: #ff2d20;">8</span>
            <span style="color: #888; font-size: 14px;">Buku Dipinjam Hari Ini</span>
        </div>
        <div style="background: #333; padding: 20px; border-radius: 8px; text-align: center;">
            <span style="display: block; font-size: 24px; font-weight: bold; color: #00ffcc;">5</span>
            <span style="color: #888; font-size: 14px;">Buku Dikembalikan</span>
        </div>
    </div>
@endsection
