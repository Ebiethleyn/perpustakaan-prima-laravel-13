@extends('layouts.app')

@section('title', 'Dashboard Perpustakaan')

@section('content')
    <div style="width: 100%; font-family: Arial, sans-serif; box-sizing: border-box;">

        <!-- Selamat Datang Banner -->
        <div style="margin-bottom: 25px; width: 100%;">
            <div style="background-color: #2d2d2d; border-left: 5px solid #ff2d20; padding: 20px; border-radius: 4px;">
                <h1 style="margin: 0; color: #ff2d20; font-size: 24px; font-weight: bold;">Selamat Datang di Perpustakaan!
                </h1>
                <p style="color: #aaa; margin: 10px 0 0 0; font-size: 14px;">Halo
                    <strong>{{ Auth::user()->namaLengkap }}</strong>, mau membaca buku apa hari ini? Jelajahi ribuan koleksi
                    digital kami.</p>
            </div>
        </div>

        <!-- Notifikasi Sukses Pinjam -->
        @if (session('success'))
            <div
                style="background-color: #1b5e20; color: #c8e6c9; padding: 15px; border-radius: 4px; margin-bottom: 25px; font-size: 14px; border-left: 5px solid #4caf50; width: 100%; box-sizing: border-box;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Box Informasi Dinamis -->
        <div style="display: flex; gap: 15px; margin-bottom: 35px; width: 100%; box-sizing: border-box;">
            <div
                style="flex: 1; background-color: #2d2d2d; padding: 20px; border-radius: 6px; text-align: center; border: 1px solid #333;">
                <div style="font-size: 32px; font-weight: bold; color: #ff2d20; margin-bottom: 5px;">
                    {{ $bukuDipinjamCount ?? 0 }}</div>
                <div style="color: #888; font-size: 13px;">Buku Sedang Dipinjam</div>
            </div>
            <div
                style="flex: 1; background-color: #2d2d2d; padding: 20px; border-radius: 6px; text-align: center; border: 1px solid #333;">
                <div style="font-size: 32px; font-weight: bold; color: #ff2d20; margin-bottom: 5px;">5</div>
                <div style="color: #888; font-size: 13px;">Koleksi Buku Favorit</div>
            </div>
            <div
                style="flex: 1; background-color: #2d2d2d; padding: 20px; border-radius: 6px; text-align: center; border: 1px solid #333;">
                <div style="font-size: 32px; font-weight: bold; color: #00e676; margin-bottom: 5px;">14 Hari</div>
                <div style="color: #888; font-size: 13px;">Sisa Batas Waktu</div>
            </div>
        </div>

        <!-- Container Utama: Menggunakan Flexbox Terisolasi -->
        <div style="display: flex; gap: 25px; width: 100%; box-sizing: border-box; align-items: flex-start;">

            <!-- Sisi Kiri: Katalog Buku (65%) -->
            <div style="width: 65%;">
                <h3
                    style="color: #fff; margin: 0 0 15px 0; border-bottom: 2px solid #ff2d20; padding-bottom: 8px; font-size: 18px;">
                    📚 Katalog Koleksi Buku</h3>
                <div
                    style="display: grid; grid-template-columns: repeat(auto-fill, minmax(210px, 1fr)); gap: 15px; width: 100%;">
                    @forelse($daftarBuku as $buku)
                        <div
                            style="background-color: #2d2d2d; border: 1px solid #333; border-radius: 6px; padding: 15px; display: flex; flex-direction: column; justify-content: space-between; box-sizing: border-box; min-height: 180px;">
                            <div>
                                <span
                                    style="background-color: #444; color: #ffa000; padding: 3px 6px; border-radius: 4px; font-size: 11px; font-weight: bold; text-transform: uppercase;">
                                    {{ $buku->kategori->isNotEmpty() ? $buku->kategori->implode('namaKategori', ', ') : 'Umum' }}
                                </span>
                                <h4 style="color: #fff; margin: 10px 0 5px 0; font-size: 14px; line-height: 1.4;">
                                    {{ $buku->judul }}</h4>
                                <p style="color: #aaa; margin: 0 0 5px 0; font-size: 12px;">Penulis: {{ $buku->penulis }}
                                </p>
                                <p style="color: #888; margin: 0 0 15px 0; font-size: 11px;">{{ $buku->penerbit }}
                                    ({{ $buku->tahun_terbit }})</p>
                            </div>

                            <form action="{{ route('siswa.pinjam') }}" method="POST" style="margin: 0; width: 100%;">
                                @csrf
                                <input type="hidden" name="bukuId" value="{{ $buku->bukuId }}">
                                <button type="submit"
                                    style="width: 100%; background-color: #ff2d20; color: white; border: none; padding: 8px; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 12px;">
                                    Pinjam Buku
                                </button>
                            </form>
                        </div>
                    @empty
                        <div style="color: #aaa; font-style: italic; padding: 10px 0;">Belum ada koleksi buku di
                            perpustakaan.</div>
                    @endforelse
                </div>
            </div>

            <!-- Sisi Ranan: Rak Pinjaman Pribadi Siswa (35%) -->
            <div style="width: 35%;">
                <h3
                    style="color: #fff; margin: 0 0 15px 0; border-bottom: 2px solid #ffa000; padding-bottom: 8px; font-size: 18px;">
                    ⏱ Rak Pinjaman Anda</h3>
                <div
                    style="background-color: #252525; border: 1px solid #333; border-radius: 6px; padding: 15px; box-sizing: border-box; width: 100%;">
                    @forelse($riwayatPinjam as $rp)
                        <div style="padding: 12px 0; border-bottom: 1px solid #333; box-sizing: border-box;">
                            <h5 style="color: #fff; margin: 0 0 5px 0; font-size: 13px;">
                                {{ $rp->buku?->judul ?? 'Buku Dihapus' }}</h5>
                            <p style="color: #888; margin: 0 0 8px 0; font-size: 11px;">Pinjam:
                                {{ \Carbon\Carbon::parse($rp->tanggalPeminjaman)->format('d M Y') }}</p>
                            @if ($rp->status === 'Dipinjam')
                                <span
                                    style="background-color: #e65100; color: #ffe0b2; padding: 2px 6px; border-radius: 4px; font-size: 10px; font-weight: bold;">Dipinjam</span>
                            @else
                                <span
                                    style="background-color: #1b5e20; color: #c8e6c9; padding: 2px 6px; border-radius: 4px; font-size: 10px; font-weight: bold;">Dikembalikan</span>
                            @endif
                        </div>
                    @empty
                        <p
                            style="color: #aaa; margin: 0; font-style: italic; text-align: center; padding: 15px 0; font-size: 13px;">
                            Anda belum meminjam buku apa pun.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
@endsection
