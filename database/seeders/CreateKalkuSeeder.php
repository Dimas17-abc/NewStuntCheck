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
        // Define an array of data to insert
        $data = [
            [
                'name' => 'John Doe',
                'age' => 30,
                'height' => 175,
                'weight' => 70,
                'category' => 1, // Adjust according to your category logic
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'age' => 28,
                'height' => 165,
                'weight' => 60,
                'category' => 2, // Adjust according to your category logic
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more records as needed
        ];

        // Insert data into the kalku table
        DB::table('kalku')->insert($data);
    }
}
