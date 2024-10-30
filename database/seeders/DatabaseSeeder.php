<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Memanggil seeder lain untuk mengisi database
        $this->call([
            CreateUsersSeeder::class, // Seeder untuk membuat pengguna
            CreateKalkuSeeder::class,  // Seeder untuk membuat data kalkulasi
        ]);
    }
}
