<?php

namespace App\Http\Controllers;

use App\Models\User; // Hubungkan dengan model User bawaanmu
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PeminjamController extends Controller
{
    /**
     * TAMPILAN UTAMA: Menampilkan semua user yang rolenya 'peminjam'
     */
    public function index()
    {
        // Mengambil data user yang hanya memiliki role peminjam
        // Sesuaikan dengan huruf besar/kecil kolom 'role' di database kamu
        $peminjam = User::query()->where('role', 'peminjam')->get();
        return view('peminjam.index', compact('peminjam'));
    }

    /**
     * TAMPILAN TAMBAH: Menampilkan form registrasi siswa/peminjam baru
     */
    public function create()
    {
        return view('peminjam.create');
    }

    /**
     * PROSES SIMPAN: Mendaftarkan akun siswa baru ke database
     */
    /**
     * PROSES SIMPAN: Mendaftarkan akun siswa baru ke database
     */
    public function store(Request $request)
    {
        // Validasi input form (Ubah 'name' menjadi 'namaLengkap')
        $request->validate([
            'namaLengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user,username',
            'email' => 'required|email|max:255|unique:user,email',
            'password' => 'required|string|min:6',
        ], [
            'namaLengkap.required' => 'Nama lengkap siswa wajib diisi!',
            'username.required' => 'Username wajib diisi!',
            'username.unique' => 'Username ini sudah digunakan oleh siswa lain!',
            'email.required' => 'Email siswa wajib diisi!',
            'email.email' => 'Format email tidak valid!',
            'email.unique' => 'Email ini sudah terdaftar!',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal harus 6 karakter!',
        ]);

        // Proses simpan data (Ubah key array menjadi namaLengkap)
        User::create([
            'namaLengkap' => $request->namaLengkap, // <-- Sinkron dengan database
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'peminjam',
        ]);

        return redirect()->route('peminjam.index')->with('success', 'Akun Peminjam/Siswa baru berhasil didaftarkan!');
    }

    /**
     * PROSES HAPUS: Menghapus akun siswa jika dikeluarkan/lulus
     */
    public function destroy(string $id)
    {
        // Sesuaikan primary key jika tabel user-mu pakai UserId (U kapital) atau userId
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('peminjam.index')->with('success', 'Akun peminjam berhasil dihapus!');
    }
}
