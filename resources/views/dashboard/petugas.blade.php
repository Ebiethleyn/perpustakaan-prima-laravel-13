@extends('layouts.app')

@section('title', 'Dashboard Petugas Operasional')

@section('content')
    <div style="width: 100%; font-family: Arial, sans-serif; box-sizing: border-box;">

        <div style="margin-bottom: 25px; width: 100%;">
            <div style="background-color: #2d2d2d; border-left: 5px solid #ff2d20; padding: 20px; border-radius: 4px;">
                <h1 style="margin: 0; color: #ff2d20; font-size: 24px; font-weight: bold;">Halo, Petugas Operasional!</h1>
                <p style="color: #aaa; margin: 10px 0 0 0; font-size: 14px;">Selamat datang kembali,
                    <strong>{{ Auth::user()->namaLengkap }}</strong>. Silakan kelola aktivitas sirkulasi perpustakaan hari
                    ini.
                </p>
            </div>
        </div>

        <div style="display: flex; gap: 15px; margin-bottom: 30px; width: 100%; box-sizing: border-box;">
            <div
                style="flex: 1; background-color: #2d2d2d; padding: 20px; border-radius: 6px; text-align: center; border: 1px solid #333;">
                <div style="font-size: 32px; font-weight: bold; color: #ff2d20; margin-bottom: 5px;">
                    {{ \App\Models\Peminjaman::where('status', 'Dipinjam')->count() }}
                </div>
                <div style="color: #888; font-size: 13px;">Perlu Verifikasi</div>
            </div>
            <div
                style="flex: 1; background-color: #2d2d2d; padding: 20px; border-radius: 6px; text-align: center; border: 1px solid #333;">
                <div style="font-size: 32px; font-weight: bold; color: #ff2d20; margin-bottom: 5px;">
                    {{ \App\Models\Peminjaman::whereDate('tanggalPeminjaman', now()->toDateString())->count() }}
                </div>
                <div style="color: #888; font-size: 13px;">Buku Dipinjam Hari Ini</div>
            </div>
        </div>

        <div
            style="background-color: #252525; border: 1px solid #333; border-radius: 6px; padding: 20px; width: 100%; box-sizing: border-box;">
            <h3
                style="color: #fff; margin: 0 0 15px 0; border-bottom: 2px solid #ff2d20; padding-bottom: 8px; font-size: 16px;">
                ⚡ Menu Pintas Kerja Petugas</h3>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 15px;">

                <a href="{{ route('transaksi.index') }}"
                    style="text-decoration: none; background-color: #2d2d2d; border: 1px solid #ff2d20; padding: 15px; border-radius: 6px; display: block; text-align: center;">
                    <div style="font-size: 24px; margin-bottom: 5px;">🔄</div>
                    <div style="color: #fff; font-weight: bold; font-size: 14px;">Log Transaksi</div>
                    <div style="color: #666; font-size: 11px; margin-top: 3px;">Verifikasi sirkulasi buku</div>
                </a>

                <a href="{{ route('buku.index') }}"
                    style="text-decoration: none; background-color: #2d2d2d; border: 1px solid #333; padding: 15px; border-radius: 6px; display: block; text-align: center;">
                    <div style="font-size: 24px; margin-bottom: 5px;">📚</div>
                    <div style="color: #fff; font-weight: bold; font-size: 14px;">Kelola Buku</div>
                    <div style="color: #666; font-size: 11px; margin-top: 3px;">CRUD katalog master buku</div>
                </a>

                <a href="{{ route('kategori.index') }}"
                    style="text-decoration: none; background-color: #2d2d2d; border: 1px solid #333; padding: 15px; border-radius: 6px; display: block; text-align: center;">
                    <div style="font-size: 24px; margin-bottom: 5px;">🏷️</div>
                    <div style="color: #fff; font-weight: bold; font-size: 14px;">Kategori Buku</div>
                    <div style="color: #666; font-size: 11px; margin-top: 3px;">Atur relasi kategori buku</div>
                </a>

                <a href="{{ route('peminjam.index') }}"
                    style="text-decoration: none; background-color: #2d2d2d; border: 1px solid #333; padding: 15px; border-radius: 6px; display: block; text-align: center;">
                    <div style="font-size: 24px; margin-bottom: 5px;">👥</div>
                    <div style="color: #fff; font-weight: bold; font-size: 14px;">Daftar Siswa</div>
                    <div style="color: #666; font-size: 11px; margin-top: 3px;">Pantau data master peminjam</div>
                </a>
                <!-- Tombol 5: Cetak Laporan PDF (Tambahan Baru) -->
                <a href="{{ route('laporan.cetak') }}"
                    style="text-decoration: none; background-color: #2d2d2d; border: 1px solid #ffa000; padding: 15px; border-radius: 6px; display: block; text-align: center;">
                    <div style="font-size: 24px; margin-bottom: 5px;">🖨️</div>
                    <div style="color: #fff; font-weight: bold; font-size: 14px;">Cetak PDF</div>
                    <div style="color: #666; font-size: 11px; margin-top: 3px;">Unduh rekap sirkulasi</div>
                </a>

            </div>
        </div>

    </div>
@endsection
