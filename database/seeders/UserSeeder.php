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
        // 1. Amankan Akun Administrator (Hanya dibuat jika belum ada)
        User::firstOrCreate(
            ['username' => 'admin_gabriel'], // Kunci pengecekan uniqueness
            [
                'password' => 'admin123',
                'email' => 'admin.gabriel@gmail.com',
                'namaLengkap' => 'Gabriel Admin Utama',
                'alamat' => 'Pasar Rebo, Jakarta East',
                'role' => 'administrator',
            ]
        );

        // 2. Amankan Akun Petugas Perpustakaan (Hanya dibuat jika belum ada)
        User::firstOrCreate(
            ['username' => 'petugas_gabriel'],
            [
                'password' => 'petugas123',
                'email' => 'petugas.gabriel@gmail.com',
                'namaLengkap' => 'Gabriel Petugas Perpus',
                'alamat' => 'Jakarta Timur',
                'role' => 'petugas',
            ]
        );

        // 3. Amankan Akun Peminjam Bawaan
        User::firstOrCreate(
            ['username' => 'peminjam_gabriel'],
            [
                'password' => 'peminjam123',
                'email' => 'peminjam.gabriel@gmail.com',
                'namaLengkap' => 'Gabriel Peminjam Buku',
                'alamat' => 'Cijantung, Pasar Rebo',
                'role' => 'peminjam',
            ]
        );

        // 4. Tambah Borongan 24 Akun Siswa Baru Khas Jakarta
        $paraSiswaJakarta = [
            'Dimas Saputra',
            'Farhan Ramadhan',
            'Siti Aminah',
            'Rizky Febrian',
            'Nabila Putri',
            'Aditya Wijaya',
            'Bintang Ramadhan',
            'Citra Lestari',
            'Dwi Kurniawan',
            'Eka Rahmawati',
            'Fajar Shidiq',
            'Gita Permata',
            'Hendra Gunawan',
            'Indah Permatasari',
            'Kevin Sanjaya',
            'Larasati Putri',
            'Muhammad Rafli',
            'Nanda Pratama',
            'Putra Perkasa',
            'Rina Marlina',
            'Syahroni Betawi',
            'Taufik Hidayat',
            'Vina Amelia',
            'Yusuf Mansur'
        ];

        foreach ($paraSiswaJakarta as $nama) {
            $userKecil = strtolower(str_replace(' ', '', $nama));

            User::firstOrCreate(
                ['username' => $userKecil],
                [
                    'password' => 'siswa123',
                    'email' => $userKecil . '@prestasiprima.sch.id',
                    'namaLengkap' => $nama,
                    'alamat' => 'Pasar Rebo, Jakarta Timur',
                    'role' => 'peminjam',
                ]
            );
        }
    }
}
