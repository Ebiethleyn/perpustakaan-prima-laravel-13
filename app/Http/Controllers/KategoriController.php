<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku; // Hubungkan dengan model kategori milikmu
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * TAMPILAN UTAMA: Menampilkan semua daftar kategori di tabel
     */
    public function index()
    {
        // Mengambil seluruh data kategori dari database
        // Sesuaikan dengan nama model aslimu (misal: KategoriBuku atau Kategori)
        $kategori = KategoriBuku::all();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * TAMPILAN TAMBAH: Menampilkan form untuk menambah kategori baru
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * PROSES SIMPAN: Menyimpan data kategori baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaKategori' => 'required|unique:kategoribuku,namaKategori', // <-- Pastikan kategoribuku
        ], [
            'namaKategori.required' => 'Nama kategori wajib diisi!',
            'namaKategori.unique' => 'Nama kategori ini sudah ada di database!',
        ]);

        KategoriBuku::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * TAMPILAN EDIT: Menampilkan form edit berdasarkan ID Kategori
     */
    public function edit(string $id)
    {
        $kategori = KategoriBuku::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * PROSES UPDATE: Memperbarui data kategori di database
     */
    public function update(Request $request, string $id)
    {
        $kategori = KategoriBuku::findOrFail($id);

        $request->validate([
            'namaKategori' => 'required|unique:kategoribuku,namaKategori,' . $kategori->kategoriId . ',kategoriId', // <-- Pastikan kategoribuku
        ], [
            'namaKategori.required' => 'Nama kategori wajib diisi!',
            'namaKategori.unique' => 'Nama kategori ini sudah ada!',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * PROSES HAPUS: Menghapus data kategori dari database
     */
    public function destroy(string $id)
    {
        $kategori = KategoriBuku::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
