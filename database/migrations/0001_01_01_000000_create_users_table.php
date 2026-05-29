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
        Schema::create('user', function (Blueprint $table) {
            $table->integer('UserId')->autoIncrement();
            $table->string('username', 50);
            $table->string('password', 255);
            $table->string('email', 100);
            $table->string('namaLengkap', 100);
            $table->text('alamat')->nullable();
            $table->enum('role', ['administrator', 'petugas', 'peminjam']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
