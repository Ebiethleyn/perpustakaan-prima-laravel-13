<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Membuat akun Administrator
        User::create([
            'username' => 'admin_gabriel',
            'password' => 'admin123', // Otomatis di-hash oleh casting model User
            'email' => 'admin.gabriel@gmail.com',
            'namaLengkap' => 'Gabriel Admin Utama',
            'alamat' => 'Pasar Rebo, Jakarta East',
            'role' => 'administrator',
        ]);

        // 2. Membuat akun Petugas Perpustakaan
        User::create([
            'username' => 'petugas_gabriel',
            'password' => 'petugas123',
            'email' => 'petugas.gabriel@gmail.com',
            'namaLengkap' => 'Gabriel Petugas Perpus',
            'alamat' => 'Jakarta Timur',
            'role' => 'petugas',
        ]);

        // 3. Membuat akun Peminjam (Siswa/Masyarakat)
        User::create([
            'username' => 'peminjam_gabriel',
            'password' => 'peminjam123',
            'email' => 'peminjam.gabriel@gmail.com',
            'namaLengkap' => 'Gabriel Peminjam Buku',
            'alamat' => 'Cijantung, Pasar Rebo',
            'role' => 'peminjam',
        ]);
    }
}
