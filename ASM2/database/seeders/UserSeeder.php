<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('123456'),
                'role' => 1,
            ]
        );

        User::updateOrCreate(
            ['email' => 'quan@gmail.com'],
            [
                'name' => 'User',
                'password' => Hash::make('password'),
                'role' => 0,
            ]
        );
    }
}
