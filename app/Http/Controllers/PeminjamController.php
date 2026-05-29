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
        $peminjam = User::where('role', 'peminjam')->get();
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
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user,username', // Sesuaikan nama tabel 'user' atau 'users'
            'password' => 'required|string|min:6',
        ], [
            'name.required' => 'Nama lengkap siswa wajib diisi!',
            'username.required' => 'Username wajib diisi!',
            'username.unique' => 'Username ini sudah digunakan oleh siswa lain!',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal harus 6 karakter!',
        ]);

        // Proses enkripsi password dan penguncian role menjadi 'peminjam'
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Wajib di-hash demi keamanan
            'role' => 'peminjam', // Dikunci otomatis agar tidak bisa nembak jadi admin
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
