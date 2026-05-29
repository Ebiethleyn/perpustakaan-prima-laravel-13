<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * TAMPILAN UTAMA: Menampilkan semua daftar buku di tabel
     */
    public function index()
    {
        $buku = Buku::all(); // Mengambil seluruh data buku dari database
        return view('buku.index', compact('buku'));
    }

    /**
     * TAMPILAN TAMBAH: Menampilkan form untuk menambah buku baru
     */
    public function create()
    {
        $kategori = KategoriBuku::all();
        return view('buku.create', compact('kategori'));
        // return view('buku.create');
    }

    /**
     * PROSES SIMPAN: Menyimpan data buku baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'kategoriId' => 'required', // Tetap divalidasi dari form dropdown
        ]);

        // 1. Simpan data buku ke tabel buku
        $buku = Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        // 2. Rekatkan data kategoriId dari form masuk ke tabel jembatan kategori_buku_relasi
        $buku->kategori()->sync($request->kategoriId);

        return redirect()->route('buku.index')->with('success', 'Buku dan Kategori berhasil ditambahkan!');
    }

    /**
     * TAMPILAN EDIT: Menampilkan form edit berdasarkan ID Buku
     */
    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = KategoriBuku::all();

        return view('buku.edit', compact('buku', 'kategori'));
        // return view('buku.edit', compact('buku'));
    }

    /**
     * PROSES UPDATE: Memperbarui data buku di database
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'kategoriId' => 'required',
        ]);

        $buku = Buku::findOrFail($id);

        // 1. Perbarui identitas buku
        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        // 2. Sinkronisasikan ulang tabel jembatan agar datanya terupdate
        $buku->kategori()->sync($request->kategoriId);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }

    /**
     * PROSES HAPUS: Menghapus data buku dari database
     */
    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }
}
