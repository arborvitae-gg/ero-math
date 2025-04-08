<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Admin (no grade level)
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'quiz_enabled' => null, // Explicitly set to NULL

        ]);

        // Regular user (with grade level)
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'grade_level' => 3,
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
