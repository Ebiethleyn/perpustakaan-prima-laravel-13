<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategori_buku_relasi', function (Blueprint $table) {
            $table->integer('kategoriBukuId')->autoIncrement();
            $table->integer('BukuId')->nullable();
            $table->integer('KategoriId')->nullable();
            $table->timestamps();

            // Relasi Foreign Key sesuai constraint SQL asli
            $table->foreign('BukuId')
                ->references('bukuId')->on('buku')
                ->onDelete('cascade');

            $table->foreign('KategoriId')
                ->references('kategoriId')->on('kategoribuku')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_buku_relasi');
    }
};
