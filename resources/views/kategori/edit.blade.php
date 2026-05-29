@extends('layouts.app')

@section('title', 'Edit Kategori Buku')

@section('content')
    <div style="margin-bottom: 25px;">
        <a href="{{ route('kategori.index') }}"
            style="color: #ff2d20; text-decoration: none; font-size: 14px; font-family: Arial, sans-serif; font-weight: bold;">
            &larr; Kembali ke Daftar Kategori
        </a>
        <h1 style="margin: 10px 0 0 0; color: #ff2d20; font-family: Arial, sans-serif;">Edit Kategori Buku</h1>
        <p style="color: #888; margin: 5px 0 0 0; font-size: 14px;">Ubah nama pengelompokan rak kategori buku perpustakaan.
        </p>
    </div>

    @if ($errors->any())
        <div
            style="background-color: #b71c1c; color: #ffcdd2; padding: 15px; border-radius: 4px; margin-bottom: 20px; font-family: Arial, sans-serif; font-size: 14px; border-left: 5px solid #f44336;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div
        style="background-color: #2d2d2d; padding: 25px; border-radius: 8px; border: 1px solid #333; max-width: 500px; font-family: Arial, sans-serif;">
        <form action="{{ route('kategori.update', $kategori->kategoriId) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 25px;">
                <label for="namaKategori"
                    style="display: block; color: #fff; font-weight: bold; margin-bottom: 8px; font-size: 14px;">Nama
                    Kategori</label>
                <input type="text" id="namaKategori" name="namaKategori"
                    value="{{ old('namaKategori', $kategori->namaKategori) }}"
                    style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #444; background-color: #1a1a1a; color: #fff; box-sizing: border-box; font-size: 14px;">
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit"
                    style="background-color: #ffa000; color: white; border: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 14px;">
                    Perbarui Kategori
                </button>
                <a href="{{ route('kategori.index') }}"
                    style="background-color: #444; color: #ccc; text-decoration: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; font-size: 14px; text-align: center;">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
