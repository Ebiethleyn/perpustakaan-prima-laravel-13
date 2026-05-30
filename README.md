<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# 📚 Perpustakaan Digital SMK Prestasi Prima

Aplikasi Manajemen Perpustakaan Digital berbasis web yang dirancang khusus untuk memenuhi standarisasi operasional sirkulasi buku di **SMK Prestasi Prima**. Aplikasi ini mengimplementasikan pemisahan hak akses multi-role, pengelolaan data master, serta modul pelaporan formal terintegrasi.

---

## 🤵 Developer Profile

- **Nama Lengkap:** Gabriel Daten Leyn
- **Asal Instansi:** Universitas Indraprasta PGRI (UNINDRA) / Mitra Kerja SMK Prestasi Prima
- **Tahun Pengembangan:** 2026

---

## ⚡ Fitur Utama Aplikasi

### Sistem Autentikasi Multi-Role

Pemisahan hak akses dinamis untuk tiga aktor utama:

#### Administrator
- Pusat kendali penuh data master.
- Manajemen Buku.
- Manajemen Kategori.
- Manajemen User Peminjam.
- Pengelolaan seluruh sirkulasi perpustakaan.

#### Petugas Operasional
- Verifikasi transaksi sirkulasi.
- Pengelolaan pengembalian buku.
- Pemantauan operasional harian.

#### Peminjam (Siswa)
- Akses katalog buku interaktif.
- Riwayat peminjaman mandiri.
- Pengajuan peminjaman buku.

### Fitur Tambahan

- **Manajemen Relasi Many-to-Many** untuk pengelompokan buku ke dalam beberapa kategori secara fleksibel.
- **Modul Laporan Ekspor PDF (Dompdf Backend)** lengkap dengan kop surat resmi instansi.
- **Dashboard Responsif** dengan tombol pintas operasional dan navigasi CRUD yang rapi.

---

## 💻 Spesifikasi Lingkungan Pengembangan (Environment)

Aplikasi ini dibangun dan berjalan optimal dengan spesifikasi berikut:

| Komponen | Spesifikasi |
|-----------|------------|
| Operating System | Windows (Laragon / MSYS Terminal) |
| PHP Version | `8.4.21 (cli)` |
| Compiler | Visual C++ 2022 x64 |
| Composer Version | `2.9.7 (2026-04-14)` |
| Framework | Laravel 13 |
| Database | SQLite / MySQL |

---

## 🚀 Langkah Instalasi & Menjalankan Proyek

### 1. Clone Repository

```bash
git clone https://github.com/Ebiethleyn/perpustakaan-prima-laravel-13.git
cd perpustakaan-prima-laravel-13
```

### 2. Install Dependensi

Install seluruh dependensi vendor termasuk Dompdf.

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`, kemudian generate application key.

```bash
cp .env.example .env
php artisan key:generate
```

Sesuaikan konfigurasi database pada file `.env`.

### 4. Jalankan Database Seeder

Perintah berikut akan menyuntikkan data master awal berupa:

- 5 kategori buku
- 20 data buku katalog
- 24 akun siswa

```bash
php artisan db:seed
```

### 5. Jalankan Server Laravel

```bash
php artisan serve
```

Akses aplikasi melalui browser:

```text
http://127.0.0.1:8000
```

---

## 🔑 Akun Uji Coba Demo Sistem

| Role | Username | Password | Hak Akses |
|--------|----------|----------|-----------|
| Administrator | `admin_gabriel` | `admin123` | Manajemen penuh & cetak PDF |
| Petugas Perpus | `petugas_gabriel` | `petugas123` | Verifikasi sirkulasi & cetak PDF |
| Siswa (Contoh 1) | `dimassaputra` | `siswa123` | Katalog & peminjaman buku |
| Siswa (Contoh 2) | `farhanramadhan` | `siswa123` | Katalog & peminjaman buku |

---

## 📄 Dokumentasi

Dokumentasi ini dibuat sebagai standar operasional prosedur (SOP) penyerahan source code aplikasi **Perpustakaan Digital SMK Prestasi Prima**.

### Tujuan Dokumentasi

- Memudahkan proses instalasi ulang.
- Menjadi panduan penggunaan sistem.
- Menjadi dokumen pendukung serah terima proyek.
- Menjadi referensi pengembangan lanjutan aplikasi.

---

## © Hak Cipta

**Perpustakaan Digital SMK Prestasi Prima**  
Dikembangkan oleh **Gabriel Daten Leyn**  
Universitas Indraprasta PGRI (UNINDRA)  
Tahun 2026
