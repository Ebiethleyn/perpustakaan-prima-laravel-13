<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriBuku;
use App\Models\Buku;
use App\Models\KategoriBukuRelasi;

class BukuAndKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Suntik Data Kategori Buku
        $sains = KategoriBuku::create(['namaKategori' => 'Sains & Teknologi']);
        $fiksi = KategoriBuku::create(['namaKategori' => 'Fiksi & Novel']);
        $sejarah = KategoriBuku::create(['namaKategori' => 'Sejarah & Budaya']);

        // 2. Suntik Data Buku
        $buku1 = Buku::create([
            'judul' => 'Belajar Jaringan Komputer Modern',
            'penulis' => 'Onno W. Purbo',
            'penerbit' => 'Andi Publisher',
            'tahun_terbit' => 2024
        ]);

        $buku2 = Buku::create([
            'judul' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'penerbit' => 'Bentang Pustaka',
            'tahun_terbit' => 2018
        ]);

        $buku3 = Buku::create([
            'judul' => 'Api Sejarah',
            'penulis' => 'Ahmad Mansur Suryanegara',
            'penerbit' => 'Salamadani',
            'tahun_terbit' => 2021
        ]);

        // 3. Suntik Data Relasi Pivot (Menghubungkan Buku dengan Kategorinya)
        KategoriBukuRelasi::create([
            'BukuId' => $buku1->bukuId,
            'KategoriId' => $sains->kategoriId
        ]);

        KategoriBukuRelasi::create([
            'BukuId' => $buku2->bukuId,
            'KategoriId' => $fiksi->kategoriId
        ]);

        KategoriBukuRelasi::create([
            'BukuId' => $buku3->bukuId,
            'KategoriId' => $sejarah->kategoriId
        ]);
    }
}
