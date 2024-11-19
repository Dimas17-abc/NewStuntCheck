<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat instance Faker untuk menghasilkan data palsu
        $faker = Faker::create();

        // Membuat user admin
        $admin = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'type' => 1,
            'role' => 'admin',
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        
        // Menyimpan user admin ke database
        User::updateOrCreate(['email' => $admin['email']], $admin);

        // Membuat 100 user secara otomatis
        for ($i = 1; $i <= 100; $i++) {
            $user = [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'type' => 0,
                'role' => 'user',
                'password' => Hash::make('user123'), // Password default
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Menyimpan user ke database
            User::updateOrCreate(['email' => $user['email']], $user);
        }
    }
}
