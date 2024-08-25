<?php

namespace Database\Seeders;

<<<<<<< HEAD
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Import Hash facade
=======
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
<<<<<<< HEAD
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
                'password' => Hash::make('admin123'),
            ],
        ];
        foreach ($users as $user) {
=======
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'admin@example.com',
               'type'=>1,
               'password'=> Hash::make('123456'),
            ],
            [
               'name'=>'Manager User',
               'email'=>'manager@example.com',
               'type'=> 2,
               'password'=> Hash::make('123456'),
            ],
            [
               'name'=>'User',
               'email'=>'user@example.com',
               'type'=>0,
               'password'=> Hash::make('123456'),
            ],
        ];

        foreach ($users as $key => $user) {
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
            User::create($user);
        }
    }
}
