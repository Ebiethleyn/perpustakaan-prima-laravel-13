@extends('layouts.app')

@section('title', 'Riwayat Transaksi Sirkulasi')

@section('content')
    <!-- Header Halaman -->
    <div style="margin-bottom: 25px;">
        <h1 style="margin: 0; color: #ff2d20; font-family: Arial, sans-serif;">Log Transaksi Sirkulasi</h1>
        <p style="color: #888; margin: 5px 0 0 0; font-size: 14px;">Pantau riwayat peminjaman dan lakukan verifikasi
            pengembalian buku siswa.</p>
    </div>

    <!-- Notifikasi Sukses -->
    @if (session('success'))
        <div
            style="background-color: #1b5e20; color: #c8e6c9; padding: 15px; border-radius: 4px; margin-bottom: 20px; font-family: Arial, sans-serif; font-size: 14px; border-left: 5px solid #4caf50;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Container Utama dengan Overflow-X Auto agar kolom kanan tidak terpotong -->
    <div style="background-color: #2d2d2d; border-radius: 8px; border: 1px solid #333; width: 100%; overflow-x: auto;">
        <table
            style="width: 100%; border-collapse: collapse; text-align: left; font-family: Arial, sans-serif; color: #fff; min-width: 900px;">
            <thead>
                <tr style="background-color: #333; border-bottom: 2px solid #ff2d20;">
                    <th style="padding: 15px; font-size: 14px; color: #ff2d20; width: 60px; text-align: center;">No</th>
                    <th style="padding: 15px; font-size: 14px;">Nama Peminjam</th>
                    <th style="padding: 15px; font-size: 14px;">Judul Buku</th>
                    <th style="padding: 15px; font-size: 14px; text-align: center; width: 140px;">Tanggal Pinjam</th>
                    <th style="padding: 15px; font-size: 14px; text-align: center; width: 140px;">Tanggal Kembali</th>
                    <th style="padding: 15px; font-size: 14px; text-align: center; width: 120px;">Status</th>
                    <th style="padding: 15px; font-size: 14px; text-align: center; width: 160px;">Aksi Verifikasi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksi as $index => $item)
                    <tr
                        style="border-bottom: 1px solid #3d3d3d; background-color: {{ $index % 2 === 0 ? '#2d2d2d' : '#252525' }};">
                        <td style="padding: 15px; text-align: center; color: #888;">{{ $index + 1 }}</td>
                        <td style="padding: 15px; font-weight: bold; color: #fff;">
                            {{ $item->user?->namaLengkap ?? 'User Dihapus' }}</td>
                        <td style="padding: 15px; color: #ccc;">{{ $item->buku?->judul ?? 'Buku Dihapus' }}</td>
                        <td style="padding: 15px; text-align: center; color: #aaa;">
                            {{ \Carbon\Carbon::parse($item->tanggalPeminjaman)->format('d M Y') }}
                        </td>
                        <td style="padding: 15px; text-align: center; color: #aaa;">
                            {{ $item->TanggalPengembalian ? \Carbon\Carbon::parse($item->TanggalPengembalian)->format('d M Y') : '-' }}
                        </td>
                        <td style="padding: 15px; text-align: center;">
                            @if ($item->status === 'Dipinjam')
                                <span
                                    style="background-color: #e65100; color: #ffe0b2; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold;">Dipinjam</span>
                            @elseif($item->status === 'Dikembalikan')
                                <span
                                    style="background-color: #1b5e20; color: #c8e6c9; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold;">Dikembalikan</span>
                            @else
                                <span
                                    style="background-color: #424242; color: #eee; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold;">{{ $item->status }}</span>
                            @endif
                        </td>
                        <td style="padding: 15px; text-align: center;">
                            @if ($item->status === 'Dipinjam')
                                <form action="{{ route('transaksi.status', $item->PeminjamId) }}" method="POST"
                                    style="margin: 0;">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="Dikembalikan">
                                    <button type="submit"
                                        style="background-color: #ff2d20; color: white; border: none; padding: 6px 12px; border-radius: 4px; font-size: 12px; font-weight: bold; cursor: pointer;">
                                        ✔ Kembalikan
                                    </button>
                                </form>
                            @else
                                <span style="color: #666; font-size: 13px; font-style: italic;">Selesai</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding: 40px; text-align: center; color: #aaa; font-style: italic;">
                            Belum ada riwayat transaksi sirkulasi di perpustakaan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
