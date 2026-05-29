<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['BukuId', 'KategoriId'])]
class KategoriBukuRelasi extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit
    protected $table = 'kategori_buku_relasi';

    // Menentukan primary key yang benar
    protected $primaryKey = 'kategoriBukuId';
}
