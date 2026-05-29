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
        Schema::create('ulasanbuku', function (Blueprint $table) {
            $table->integer('ulasanId')->autoIncrement();
            $table->integer('UserId')->nullable();
            $table->integer('BukuId')->nullable();
            $table->text('ulasan')->nullable();
            $table->integer('rating')->nullable();
            $table->timestamps();

            // Relasi Foreign Key sesuai dengan file SQL asli
            $table->foreign('UserId')
                ->references('UserId')->on('user')
                ->onDelete('cascade');

            $table->foreign('BukuId')
                ->references('bukuId')->on('buku')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasanbuku');
    }
};
