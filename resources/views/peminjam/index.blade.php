@extends('layouts.app')

@section('title', 'Daftar Peminjam / Siswa')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <div>
            <h1 style="margin: 0; color: #ff2d20; font-family: Arial, sans-serif;">Manajemen Akun Peminjam</h1>
            <p style="color: #888; margin: 5px 0 0 0; font-size: 14px;">Kelola registrasi akun siswa dan hak akses peminjaman
                buku.</p>
        </div>
        <a href="{{ route('peminjam.create') }}"
            style="background-color: #ff2d20; color: white; text-decoration: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; font-family: Arial, sans-serif; font-size: 14px; transition: 0.2s;">
            + Registrasi Peminjam Baru
        </a>
    </div>

    @if (session('success'))
        <div
            style="background-color: #1b5e20; color: #c8e6c9; padding: 15px; border-radius: 4px; margin-bottom: 20px; font-family: Arial, sans-serif; font-size: 14px; border-left: 5px solid #4caf50;">
            {{ session('success') }}
        </div>
    @endif

    <div style="background-color: #2d2d2d; border-radius: 8px; overflow: hidden; border: 1px solid #333; max-width: 900px;">
        <table
            style="width: 100%; border-collapse: collapse; text-align: left; font-family: Arial, sans-serif; color: #fff;">
            <thead>
                <tr style="background-color: #333; border-bottom: 2px solid #ff2d20;">
                    <th style="padding: 15px; font-size: 14px; color: #ff2d20; width: 60px; text-align: center;">No</th>
                    <th style="padding: 15px; font-size: 14px;">Nama Lengkap Siswa</th>
                    <th style="padding: 15px; font-size: 14px;">Username</th>
                    <th style="padding: 15px; font-size: 14px; width: 120px; text-align: center;">Role</th>
                    <th style="padding: 15px; font-size: 14px; width: 150px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($peminjam as $index => $item)
                    <tr
                        style="border-bottom: 1px solid #3d3d3d; background-color: {{ $index % 2 === 0 ? '#2d2d2d' : '#252525' }};">
                        <td style="padding: 15px; text-align: center; color: #888;">{{ $index + 1 }}</td>
                        <td style="padding: 15px; font-weight: bold; color: #fff;">{{ $item->name }}</td>
                        <td style="padding: 15px; color: #ccc;">{{ $item->username }}</td>
                        <td style="padding: 15px; text-align: center;">
                            <span
                                style="background-color: #444; color: #ff2d20; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: bold; text-transform: uppercase;">
                                {{ $item->role }}
                            </span>
                        </td>
                        <td style="padding: 15px; text-align: center;">
                            <form action="{{ route('peminjam.destroy', $item->UserId ?? $item->id) }}" method="POST"
                                style="margin: 0;"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun siswa ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    style="background-color: #d32f2f; color: white; border: none; padding: 6px 12px; border-radius: 4px; font-size: 12px; font-weight: bold; cursor: pointer;">
                                    Hapus Akun
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 30px; text-align: center; color: #aaa; font-style: italic;">
                            Belum ada akun siswa/peminjam yang terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
