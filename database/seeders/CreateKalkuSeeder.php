<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateKalkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data kalku yang akan dimasukkan
        $data = [
            [
                'name' => 'John Doe',
                'age' => 30,
                'gender' => 'male',
                'height' => 175,
                'weight' => 70,
                'category' => 1, // Adjust according to your category logic
                'user_id' => 1, // User ID dari Admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'age' => 28,
                'gender' => 'female',
                'height' => 165,
                'weight' => 60,
                'category' => 2, // Adjust according to your category logic
                'user_id' => 2, // User ID dari User1
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data into the kalku table
        DB::table('kalkus')->insert($data);
    }
}
