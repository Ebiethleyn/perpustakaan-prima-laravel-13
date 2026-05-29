<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['UserId', 'BukuId', 'ulasan', 'rating'])]
class UlasanBuku extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit
    protected $table = 'ulasanbuku';

    // Menentukan primary key yang benar
    protected $primaryKey = 'ulasanId';
}
