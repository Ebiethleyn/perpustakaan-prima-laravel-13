<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['judul', 'penulis', 'penerbit', 'tahun_terbit'])]
class Buku extends Model
{
    use HasFactory;

    // 1. Menegaskan nama tabel wajib tunggal 'buku'
    protected $table = 'buku';

    // 2. Menegaskan primary key wajib 'bukuId'
    protected $primaryKey = 'bukuId';

    public function kategori()
    {
        // Parameter: NamaModelTarget, KolomForeignIDDiTabelBuku, KolomPrimaryKeyDiTabelKategori
        return $this->belongsTo(KategoriBuku::class, 'kategoriId', 'kategoriId');
    }
}
