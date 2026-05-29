<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['UserId', 'BukuId', 'tanggalPeminjaman', 'TanggalPengembalian', 'status'])]
class Peminjaman extends Model
{
    use HasFactory;

    // Mengunci nama tabel sesuai file migrasi asli kamu
    protected $table = 'peminjam';
    protected $primaryKey = 'PeminjamId';

    /**
     * RELASI: Mengetahui siapa siswa yang meminjam
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'UserId', 'UserId');
    }

    /**
     * RELASI: Mengetahui buku apa yang dipinjam
     */
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'BukuId', 'bukuId');
    }
}
