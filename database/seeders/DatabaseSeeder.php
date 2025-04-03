<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{
    User::create([
        'first_name' => 'Admin',
        'last_name' => 'User',
        'email' => 'admin@example.com',
        'password' => bcrypt('securepassword'),
        'role' => 'admin'
    ]);

    User::create([
        'first_name' => 'Regular',
        'last_name' => 'User',
        'email' => 'user@example.com',
        'password' => bcrypt('userpassword')
        // Role defaults to 'user'
    ]);
}
}
