<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman form login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Memproses logika login user
     */
    public function login(Request $request)
    {
        // 1. Validasi input dari form
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // 2. Proses autentikasi menggunakan Auth guard bawaan Laravel
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Memisah pengalihan halaman secara presisi berdasarkan 3 role asli database
            if ($user->role === 'administrator') {
                return redirect()->intended('/dashboard/admin');
            } elseif ($user->role === 'petugas') {
                return redirect()->intended('/dashboard/petugas');
            } else {
                return redirect()->intended('/dashboard/peminjam');
            }
        }

        // 3. Jika login gagal, kembalikan ke form dengan pesan error
        return back()->withErrors([
            'loginError' => 'Username atau password yang kamu masukkan salah.',
        ])->onlyInput('username');
    }

    /**
     * Memproses logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Hancurkan session lama dan buat token baru agar aman
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Kamu berhasil logout.');
    }
}
