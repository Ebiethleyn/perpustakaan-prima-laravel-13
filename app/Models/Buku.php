<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

// Kembalikan ke polosan awal, karena data kategori tidak disimpan langsung di tabel buku
#[Fillable(['judul', 'penulis', 'penerbit', 'tahun_terbit'])]
class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'bukuId';

    /**
     * RELASI BARU: Banyak ke Banyak melewati tabel jembatan kategori_buku_relasi
     */
    public function kategori()
    {
        return $this->belongsToMany(
            KategoriBuku::class,     // Model target
            'kategori_buku_relasi',  // Nama tabel jembatan asli kamu
            'BukuId',                // Foreign key tabel jembatan yang merujuk ke buku
            'KategoriId',            // Foreign key tabel jembatan yang merujuk ke kategori
            'bukuId',                // Primary key tabel buku
            'kategoriId'             // Primary key tabel kategoribuku
        );
    }
}
