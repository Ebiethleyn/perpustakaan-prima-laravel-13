@extends('layouts.app')

@section('title', 'Registrasi Peminjam Baru')

@section('content')
    <div style="margin-bottom: 25px;">
        <a href="{{ route('peminjam.index') }}"
            style="color: #ff2d20; text-decoration: none; font-size: 14px; font-family: Arial, sans-serif; font-weight: bold;">
            &larr; Kembali ke Daftar Akun
        </a>
        <h1 style="margin: 10px 0 0 0; color: #ff2d20; font-family: Arial, sans-serif;">Registrasi Peminjam Baru</h1>
        <p style="color: #888; margin: 5px 0 0 0; font-size: 14px;">Daftarkan akun siswa baru agar bisa melakukan transaksi
            sirkulasi buku.</p>
    </div>

    @if ($errors->any())
        <div
            style="background-color: #b71c1c; color: #ffcdd2; padding: 15px; border-radius: 4px; margin-bottom: 20px; font-family: Arial, sans-serif; font-size: 14px; border-left: 5px solid #f44336;">
            <strong style="display: block; margin-bottom: 5px;">Mohon periksa kembali inputan Anda:</strong>
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div
        style="background-color: #2d2d2d; padding: 25px; border-radius: 8px; border: 1px solid #333; max-width: 550px; font-family: Arial, sans-serif;">
        <form action="{{ route('peminjam.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 20px;">
                <label for="name"
                    style="display: block; color: #fff; font-weight: bold; margin-bottom: 8px; font-size: 14px;">Nama
                    Lengkap Siswa</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    placeholder="Contoh: Muhammad Rizky"
                    style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #444; background-color: #1a1a1a; color: #fff; box-sizing: border-box; font-size: 14px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="username"
                    style="display: block; color: #fff; font-weight: bold; margin-bottom: 8px; font-size: 14px;">Username
                    Akun</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}"
                    placeholder="Contoh: rizky_perpus"
                    style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #444; background-color: #1a1a1a; color: #fff; box-sizing: border-box; font-size: 14px;">
            </div>

            <div style="margin-bottom: 25px;">
                <label for="password"
                    style="display: block; color: #fff; font-weight: bold; margin-bottom: 8px; font-size: 14px;">Password
                    Awal</label>
                <input type="password" id="password" name="password" placeholder="Minimal 6 karakter"
                    style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #444; background-color: #1a1a1a; color: #fff; box-sizing: border-box; font-size: 14px;">
                <small style="color: #888; display: block; margin-top: 5px; font-size: 12px;">Akun otomatis terdaftar dengan
                    hak akses (role): <strong>peminjam</strong></small>
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit"
                    style="background-color: #ff2d20; color: white; border: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 14px;">
                    Daftarkan Siswa
                </button>
                <a href="{{ route('peminjam.index') }}"
                    style="background-color: #444; color: #ccc; text-decoration: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; font-size: 14px; text-align: center;">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
