@extends('layouts.app')

@section('title', 'Edit Data Buku')

@section('content')
    <div style="margin-bottom: 25px;">
        <a href="{{ route('buku.index') }}"
            style="color: #ff2d20; text-decoration: none; font-size: 14px; font-family: Arial, sans-serif; font-weight: bold;">
            &larr; Kembali ke Daftar Buku
        </a>
        <h1 style="margin: 10px 0 0 0; color: #ff2d20; font-family: Arial, sans-serif;">Edit Detail Buku</h1>
        <p style="color: #888; margin: 5px 0 0 0; font-size: 14px;">Perbarui data informasi buku perpustakaan digital.</p>
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
        style="background-color: #2d2d2d; padding: 25px; border-radius: 8px; border: 1px solid #333; max-width: 600px; font-family: Arial, sans-serif;">
        <form action="{{ route('buku.update', $buku->bukuId) }}" method="POST">
            @csrf
            @method('PUT') <div style="margin-bottom: 20px;">
                <label for="judul"
                    style="display: block; color: #fff; font-weight: bold; margin-bottom: 8px; font-size: 14px;">Judul
                    Buku</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $buku->judul) }}"
                    style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #444; background-color: #1a1a1a; color: #fff; box-sizing: border-box; font-size: 14px;">
            </div>

            {{--    --}}
            <div style="margin-bottom: 20px;">
                <label for="kategoriId"
                    style="display: block; color: #fff; font-weight: bold; margin-bottom: 8px; font-size: 14px;">Kategori
                    Buku</label>
                <select id="kategoriId" name="kategoriId" required
                    style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #444; background-color: #1a1a1a; color: #fff; box-sizing: border-box; font-size: 14px;">
                    <option value="">-- Pilih Rak Kategori --</option>
                    @foreach ($kategori as $kat)
                        <option value="{{ $kat->kategoriId }}"
                            {{ old('kategoriId', $buku->kategoriId) == $kat->kategoriId ? 'selected' : '' }}>
                            {{ $kat->namaKategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="penulis"
                    style="display: block; color: #fff; font-weight: bold; margin-bottom: 8px; font-size: 14px;">Nama
                    Penulis</label>
                <input type="text" id="penulis" name="penulis" value="{{ old('penulis', $buku->penulis) }}"
                    style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #444; background-color: #1a1a1a; color: #fff; box-sizing: border-box; font-size: 14px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="penerbit"
                    style="display: block; color: #fff; font-weight: bold; margin-bottom: 8px; font-size: 14px;">Penerbit</label>
                <input type="text" id="penerbit" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}"
                    style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #444; background-color: #1a1a1a; color: #fff; box-sizing: border-box; font-size: 14px;">
            </div>

            <div style="margin-bottom: 25px;">
                <label for="tahun_terbit"
                    style="display: block; color: #fff; font-weight: bold; margin-bottom: 8px; font-size: 14px;">Tahun
                    Terbit</label>
                <input type="number" id="tahunTerbit" name="tahun_terbit"
                    value="{{ old('tahun_terbit', $buku->tahunTerbit) }}"
                    style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #444; background-color: #1a1a1a; color: #fff; box-sizing: border-box; font-size: 14px;">
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit"
                    style="background-color: #ffa000; color: white; border: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 14px;">
                    Perbarui Buku
                </button>
                <a href="{{ route('buku.index') }}"
                    style="background-color: #444; color: #ccc; text-decoration: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; font-size: 14px; text-align: center;">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
