<?php

namespace App\Http\Controllers;


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
        return view('buku.create');
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
            'tahun_terbit' => 'required|numeric', // <-- Ubah ke tahun_terbit
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * TAMPILAN EDIT: Menampilkan form edit berdasarkan ID Buku
     */
    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
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
            'tahun_terbit' => 'required|numeric', // <-- Ubah ke tahun_terbit
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

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
