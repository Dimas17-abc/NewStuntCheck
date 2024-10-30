<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array pengguna untuk disimpan
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'type' => 1,
                'role' => 'admin',
                'password' => Hash::make('admin123'), // Enkripsi password
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Anda bisa menambahkan pengguna lain di sini jika diperlukan
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'type' => 0, // User biasa
                'role' => 'user',
                'password' => Hash::make('user123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Loop untuk menyimpan setiap pengguna ke dalam database
        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']], // Cek berdasarkan email untuk menghindari duplikat
                $user // Data pengguna
            );
        }
    }
}
