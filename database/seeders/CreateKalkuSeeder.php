<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CreateKalkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari user berdasarkan email atau informasi lain
        $admin = User::where('email', 'admin@gmail.com')->first();
       ; // Sesuaikan dengan email user yang benar

        // Pastikan user ditemukan sebelum memasukkan data
        if ($admin) {
            // Data kalku yang akan dimasukkan
            $data = [
                [
                    'name' => 'John Doe',
                    'age' => 30,
                    'gender' => 'male',
                    'height' => 175,
                    'weight' => 70,
                    'category' => 1, // Sesuaikan dengan logika kategori
                    'user_id' => $admin->id, // ID dari Admin
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ];

            // Insert data ke tabel kalku
            DB::table('kalkus')->insert($data);
        } else {
            // Logika error handling jika user tidak ditemukan
            $this->command->info('User tidak ditemukan. Pastikan email user sudah benar.');
        }
    }
}
