<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# 📚 Perpustakaan Digital SMK Prestasi Prima

Aplikasi Manajemen Perpustakaan Digital berbasis web yang dirancang khusus untuk memenuhi standarisasi operasional sirkulasi buku di **SMK Prestasi Prima**. Aplikasi ini mengimplementasikan pemisahan hak akses multirole, pengelolaan data master, serta modul pelaporan formal terintegrasi.

---

## 🤵 Developer Profile
* **Nama Lengkap:** Gabriel Daten Leyn
* **Asal Instansi:** Universitas Indraprasta PGRI (UNINDRA) / Mitra Kerja SMK Prestasi Prima
* **Tahun Pengembangan:** 2026

---

## ⚡ Fitur Utama Aplikasi
* **Sistem Autentikasi Multi-Role:** Pemisahan hak akses dinamis untuk tiga aktor utama:
  * **Administrator:** Pusat kendali penuh data master (Buku, Kategori, User Peminjam) dan sirkulasi.
  * **Petugas Operasional:** Verifikator sirkulasi transaksi, pengembalian buku, dan pemantauan harian.
  * **Peminjam (Siswa):** Akses katalog buku interaktif dan pencatatan riwayat peminjaman mandiri.
* **Manajemen Relasi Many-to-Many:** Pengelompokan buku ke dalam beberapa rak kategori dinamis secara fleksibel.
* **Modul Laporan Ekspor PDF (Dompdf Backend):** Fitur cetak rekapitulasi data sirkulasi perpustakaan secara murni dari server lengkap dengan Kop Surat formal instansi.
* **Navigasi Dashboard Responsif:** Tombol pintas kendali operasional dan tombol kembali antar halaman CRUD yang bersandingan rapi.

---

## 💻 Spesifikasi Lingkungan Pengembangan (Environment)
Aplikasi ini dibangun dan berjalan optimal di atas ekosistem modern dengan spesifikasi berikut:
* **Operating System:** Windows (via Laragon / MSYS Terminal)
* **PHP Version:** `8.4.21 (cli)` (Visual C++ 2022 x64)
* **Composer Version:** `2.9.7 (2026-04-14)`
* **Framework:** Laravel 13 Ecosystem
* **Database:** SQLite / MySQL Engine

---

## 🚀 Langkah Instalasi & Menjalankan Proyek

Jika aplikasi ini ingin dijalankan ulang di komputer penguji atau lingkungan server baru, silakan ikuti instruksi terminal di bawah ini:

### 1. Kloning Repositori & Masuk ke Direktori Proyek
```bash
git clone [https://github.com/Ebiethleyn/perpustakaan-prima-laravel-13.git](https://github.com/Ebiethleyn/perpustakaan-prima-laravel-13.git)
cd perpustakaan-prima-laravel-13
