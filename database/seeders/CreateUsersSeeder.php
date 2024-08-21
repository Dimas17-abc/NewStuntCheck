<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Import Hash facade

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'type' => 1,
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Manager User',
                'email' => 'manager@example.com',
                'type' => 2,
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'type' => 0,
                'password' => Hash::make('123456'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
