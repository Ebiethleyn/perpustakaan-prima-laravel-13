@extends('layouts.app')

@section('title', 'Daftar Koleksi Buku')

@section('content')
    <!-- Header Halaman & Tombol Tambah -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <div>
            <h1 style="margin: 0; color: #ff2d20; font-family: Arial, sans-serif;">Daftar Koleksi Buku</h1>
            <p style="color: #888; margin: 5px 0 0 0; font-size: 14px;">Kelola data master buku perpustakaan digital.</p>
        </div>
        <a href="{{ route('buku.create') }}"
            style="background-color: #ff2d20; color: white; text-decoration: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; font-family: Arial, sans-serif; font-size: 14px; transition: 0.2s;">
            + Tambah Buku Baru
        </a>
    </div>

    <!-- Notifikasi Sukses Jika Berhasil Simpan/Edit/Hapus -->
    @if (session('success'))
        <div
            style="background-color: #1b5e20; color: #c8e6c9; padding: 15px; border-radius: 4px; margin-bottom: 20px; font-family: Arial, sans-serif; font-size: 14px; border-left: 5px solid #4caf50;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Data Buku -->
    <div style="background-color: #2d2d2d; border-radius: 8px; overflow: hidden; border: 1px solid #333;">
        <table
            style="width: 100%; border-collapse: collapse; text-align: left; font-family: Arial, sans-serif; color: #fff;">
            <thead>
                <tr style="background-color: #333; border-bottom: 2px solid #ff2d20;">
                    <th style="padding: 15px; font-size: 14px; color: #ff2d20; width: 60px; text-align: center;">No</th>
                    <th style="padding: 15px; font-size: 14px;">Judul Buku</th>
                    <th style="padding: 15px; font-size: 14px;">Penulis</th>
                    <th style="padding: 15px; font-size: 14px;">Penerbit</th>
                    <th style="padding: 15px; font-size: 14px; width: 120px; text-align: center;">Tahun Terbit</th>
                    <th style="padding: 15px; font-size: 14px; width: 180px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($buku as $index => $item)
                    <tr
                        style="border-bottom: 1px solid #3d3d3d; transition: 0.2s; background-color: {{ $index % 2 === 0 ? '#2d2d2d' : '#252525' }}">
                        <td style="padding: 15px; text-align: center; color: #888;">{{ $index + 1 }}</td>
                        <td style="padding: 15px; font-weight: bold; color: #fff;">{{ $item->judul }}</td>
                        <td style="padding: 15px; color: #ccc;">{{ $item->penulis }}</td>
                        <td style="padding: 15px; color: #ccc;">{{ $item->penerbit }}</td>
                        <td style="padding: 15px; text-align: center; color: #ff2d20; font-weight: bold;">
                            {{ $item->tahunTerbit }}</td>
                        <td style="padding: 15px; text-align: center;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <!-- Tombol Edit -->
                                <a href="{{ route('buku.edit', $item->id) }}"
                                    style="background-color: #ffa000; color: white; text-decoration: none; padding: 6px 12px; border-radius: 4px; font-size: 12px; font-weight: bold;">
                                    Edit
                                </a>

                                <!-- Tombol Hapus (Menggunakan Form POST + Method DELETE) -->
                                <form action="{{ route('buku.destroy', $item->id) }}" method="POST" style="margin: 0;"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        style="background-color: #d32f2f; color: white; border: none; padding: 6px 12px; border-radius: 4px; font-size: 12px; font-weight: bold; cursor: pointer;">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding: 30px; text-align: center; color: #aaa; font-style: italic;">
                            Belum ada data koleksi buku di database perpustakaan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
