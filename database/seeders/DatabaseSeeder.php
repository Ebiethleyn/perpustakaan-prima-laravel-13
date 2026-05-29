<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Memanggil UserSeeder agar ikut dieksekusi secara berurutan
        $this->call([
            UserSeeder::class,
        ]);
    }
}
