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
            // Regenerasi session agar aman dari serangan Session Fixation
            $request->session()->regenerate();

            // Cek role user untuk pengalihan halaman dashboard yang sesuai
            $user = Auth::user();
            if (in_array($user->role, ['administrator', 'petugas'])) {
                return redirect()->intended('/dashboard/internal');
            }

            return redirect()->intended('/dashboard/peminjam');
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
