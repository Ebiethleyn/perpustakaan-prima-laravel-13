@extends('layouts.app')

@section('title', 'Daftar Kategori Buku')

@section('content')
    <!-- Header Halaman -->
    <div
        style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; font-family: Arial, sans-serif;">
        <div>
            <h1 style="margin: 0; color: #ff2d20; font-weight: bold;">Daftar Kategori Buku</h1>
            <p style="color: #888; margin: 5px 0 0 0; font-size: 14px;">Kelola pengelompokan rak kategori buku perpustakaan.
            </p>
        </div>

        <!-- Kontainer Tombol Aksi Sebelah Kanan -->
        <div style="display: flex; gap: 10px; align-items: center;">
            <a href="{{ Auth::user()->role === 'administrator' ? url('/dashboard/admin') : url('/dashboard/petugas') }}"
                style="text-decoration: none; background-color: #333; color: #fff; padding: 10px 16px; border-radius: 4px; font-weight: bold; font-size: 14px; border: 1px solid #444; transition: 0.2s;">
                ⬅️ Dashboard Utama
            </a>

            <a href="{{ route('kategori.create') }}"
                style="background-color: #ff2d20; color: white; text-decoration: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; font-size: 14px; transition: 0.2s;">
                + Tambah Kategori Baru
            </a>
        </div>
    </div>

    @if (session('success'))
        <div
            style="background-color: #1b5e20; color: #c8e6c9; padding: 15px; border-radius: 4px; margin-bottom: 20px; font-family: Arial, sans-serif; font-size: 14px; border-left: 5px solid #4caf50;">
            {{ session('success') }}
        </div>
    @endif

    <div style="background-color: #2d2d2d; border-radius: 8px; overflow: hidden; border: 1px solid #333; max-width: 800px;">
        <table
            style="width: 100%; border-collapse: collapse; text-align: left; font-family: Arial, sans-serif; color: #fff;">
            <thead>
                <tr style="background-color: #333; border-bottom: 2px solid #ff2d20;">
                    <th style="padding: 15px; font-size: 14px; color: #ff2d20; width: 60px; text-align: center;">No</th>
                    <th style="padding: 15px; font-size: 14px;">Nama Kategori</th>
                    <th style="padding: 15px; font-size: 14px; width: 180px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategori as $index => $item)
                    <tr
                        style="border-bottom: 1px solid #3d3d3d; background-color: {{ $index % 2 === 0 ? '#2d2d2d' : '#252525' }};">
                        <td style="padding: 15px; text-align: center; color: #888;">{{ $index + 1 }}</td>
                        <td style="padding: 15px; font-weight: bold; color: #fff;">{{ $item->namaKategori }}</td>
                        <td style="padding: 15px; text-align: center;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <a href="{{ route('kategori.edit', $item->kategoriId) }}"
                                    style="background-color: #ffa000; color: white; text-decoration: none; padding: 6px 12px; border-radius: 4px; font-size: 12px; font-weight: bold; display: inline-block;">
                                    Edit
                                </a>

                                <form action="{{ route('kategori.destroy', $item->kategoriId) }}" method="POST"
                                    style="margin: 0; display: inline-block;"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
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
                        <td colspan="3" style="padding: 30px; text-align: center; color: #aaa; font-style: italic;">
                            Belum ada data kategori buku di database.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
