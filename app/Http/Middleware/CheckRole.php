<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Cek apakah user sudah login atau belum
        if (!Auth::check()) {
            return redirect('/login')->withErrors([
                'loginError' => 'Silakan login terlebih dahulu untuk mengakses halaman tersebut.'
            ]);
        }

        // 2. Cek apakah role user saat ini ada di dalam daftar role yang diizinkan
        $user = Auth::user();
        if (!in_array($user->role, $roles)) {
            // Jika role tidak sesuai, lempar balik ke dashboard aslinya masing-masing
            if ($user->role === 'administrator') {
                return redirect('/dashboard/admin');
            } elseif ($user->role === 'petugas') {
                return redirect('/dashboard/petugas');
            } else {
                return redirect('/dashboard/peminjam');
            }
        }

        return $next($request);
    }
}
