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
        // 1. Tambah 5 Data Kategori Baru Menggunakan Model
        $fiksi = KategoriBuku::create(['namaKategori' => 'Fiksi & Sastra']);
        $sejarah = KategoriBuku::create(['namaKategori' => 'Sejarah & Budaya']);
        $teknologi = KategoriBuku::create(['namaKategori' => 'Teknologi & Komputer']);
        $selfDev = KategoriBuku::create(['namaKategori' => 'Pengembangan Diri']);
        $sains = KategoriBuku::create(['namaKategori' => 'Sains & Matematika']);

        // 2. Tambah 20 Data Buku Baru Menggunakan Model

        // Kategori: Fiksi & Sastra
        $b1 = Buku::create(['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2005]);
        $b2 = Buku::create(['judul' => 'Bumi Manusia', 'penulis' => 'Pramoedya Ananta Toer', 'penerbit' => 'Lentera Dipantara', 'tahun_terbit' => 2005]);
        $b3 = Buku::create(['judul' => 'Ronggeng Dukuh Paruk', 'penulis' => 'Ahmad Tohari', 'penerbit' => 'Gramedia Pustaka Utama', 'tahun_terbit' => 2003]);
        $b4 = Buku::create(['judul' => 'Gadis Kretek', 'penulis' => 'Ratih Kumala', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2012]);

        // Kategori: Sejarah & Budaya
        $b5 = Buku::create(['judul' => 'Api Sejarah', 'penulis' => 'Ahmad Mansur Suryanegara', 'penerbit' => 'Salamadani', 'tahun_terbit' => 2021]);
        $b6 = Buku::create(['judul' => 'Sejarah Tuhan', 'penulis' => 'Karen Armstrong', 'penerbit' => 'Mizan', 'tahun_terbit' => 2019]);
        $b7 = Buku::create(['judul' => 'Nusantara: Sejarah Indonesia', 'penulis' => 'Bernard H.M. Vlekke', 'penerbit' => 'KPG', 'tahun_terbit' => 2016]);
        $b8 = Buku::create(['judul' => 'G30S/PKI: Fakta atau Rekayasa', 'penulis' => 'Prof. Dr. Salim Haji', 'penerbit' => 'Sinar Harapan', 'tahun_terbit' => 2015]);

        // Kategori: Teknologi & Komputer
        $b9 = Buku::create(['judul' => 'Jago Pemrograman PHP & Laravel', 'penulis' => 'Ekosistem Kode', 'penerbit' => 'Informatika', 'tahun_terbit' => 2024]);
        $b10 = Buku::create(['judul' => 'Arsitektur Jaringan Komputer Modern', 'penulis' => 'Gabriel Daten Leyn', 'penerbit' => 'Prestasi Prima Press', 'tahun_terbit' => 2026]);
        $b11 = Buku::create(['judul' => 'Dasar Framework Flutter & Dart', 'penulis' => 'Arif Rachman', 'penerbit' => 'Elex Media Komputindo', 'tahun_terbit' => 2025]);
        $b12 = Buku::create(['judul' => 'Kuasai SQL Dan Manajemen Database MySQL', 'penulis' => 'Priyanto Hidayat', 'penerbit' => 'Andi Offset', 'tahun_terbit' => 2023]);

        // Kategori: Pengembangan Diri
        $b13 = Buku::create(['judul' => 'Atomic Habits', 'penulis' => 'James Clear', 'penerbit' => 'Gramedia Pustaka Utama', 'tahun_terbit' => 2019]);
        $b14 = Buku::create(['judul' => 'Berpikir Cepat dan Lambat', 'penulis' => 'Daniel Kahneman', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2020]);
        $b15 = Buku::create(['judul' => 'Filosofi Teras', 'penulis' => 'Henry Manampiring', 'penerbit' => 'Kompas', 'tahun_terbit' => 2019]);
        $b16 = Buku::create(['judul' => 'Sebuah Seni untuk Bersikap Bodo Amat', 'penulis' => 'Mark Manson', 'penerbit' => 'Grasindo', 'tahun_terbit' => 2018]);

        // Kategori: Sains & Matematika
        $b17 = Buku::create(['judul' => 'Kosmos: Kelana Alam Semesta', 'penulis' => 'Carl Sagan', 'penerbit' => 'KPG', 'tahun_terbit' => 2021]);
        $b18 = Buku::create(['judul' => 'Pengantar Matematika Diskrit', 'penulis' => 'Rinaldi Munir', 'penerbit' => 'Informatika', 'tahun_terbit' => 2022]);
        $b19 = Buku::create(['judul' => 'Fisika Kuantum Bagi Pemula', 'penulis' => 'Prof. Yohanes Surya', 'penerbit' => 'Kandel', 'tahun_terbit' => 2020]);
        $b20 = Buku::create(['judul' => 'Asal-usul Spesies', 'penulis' => 'Charles Darwin', 'penerbit' => 'Pustaka Obor', 'tahun_terbit' => 2017]);

        // 3. Suntik Data Relasi Pivot Menggunakan Instance Objek Dinamis
        KategoriBukuRelasi::create(['BukuId' => $b1->bukuId, 'KategoriId' => $fiksi->kategoriId]);
        KategoriBukuRelasi::create(['BukuId' => $b2->bukuId, 'KategoriId' => $fiksi->kategoriId]);
        KategoriBukuRelasi::create(['BukuId' => $b3->bukuId, 'KategoriId' => $fiksi->kategoriId]);
        KategoriBukuRelasi::create(['BukuId' => $b4->bukuId, 'KategoriId' => $fiksi->kategoriId]);

        KategoriBukuRelasi::create(['BukuId' => $b5->bukuId, 'KategoriId' => $sejarah->kategoriId]);
        KategoriBukuRelasi::create(['BukuId' => $b6->bukuId, 'KategoriId' => $sejarah->kategoriId]);
        KategoriBukuRelasi::create(['BukuId' => $b7->bukuId, 'KategoriId' => $sejarah->kategoriId]);
        KategoriBukuRelasi::create(['BukuId' => $b8->bukuId, 'KategoriId' => $sejarah->kategoriId]);

        KategoriBukuRelasi::create(['BukuId' => $b9->bukuId, 'KategoriId' => $teknologi->kategoriId]);
        KategoriBukuRelasi::create(['BukuId' => $b10->bukuId, 'KategoriId' => $teknologi->kategoriId]);
        KategoriBukuRelasi::create(['BukuId' => $b11->bukuId, 'KategoriId' => $teknologi->kategoriId]);
        KategoriBukuRelasi::create(['BukuId' => $b12->bukuId, 'KategoriId' => $teknologi->kategoriId]);

        KategoriBukuRelasi::create(['BukuId' => $b13->bukuId, 'KategoriId' => $selfDev->kategoriId]);
        KategoriBukuRelasi::create(['BukuId' => $b14->bukuId, 'KategoriId' => $selfDev->kategoriId]);
        KategoriBukuRelasi::create(['BukuId' => $b15->bukuId, 'KategoriId' => $selfDev->kategoriId]);
        KategoriBukuRelasi::create(['BukuId' => $b16->bukuId, 'KategoriId' => $selfDev->kategoriId]);

        KategoriBukuRelasi::create(['BukuId' => $b17->bukuId, 'KategoriId' => $sains->kategoriId]);
        KategoriBukuRelasi::create(['BukuId' => $b18->bukuId, 'KategoriId' => $sains->kategoriId]);
        KategoriBukuRelasi::create(['BukuId' => $b19->bukuId, 'KategoriId' => $sains->kategoriId]);
        KategoriBukuRelasi::create(['BukuId' => $b20->bukuId, 'KategoriId' => $sains->kategoriId]);
    }
}
