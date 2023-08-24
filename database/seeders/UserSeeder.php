<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds to create required users for the system and assign role.
     *
     * @return void
     */
    public function run(): void
    {
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'username'          => 'admin',
                'name'              => 'Admin',
                'email'             => 'admin@example.com',
                'country_code'      => '+91',
                'mobile'            => '1234567890',
                'email_verified_at' => now(),
                'password'          => Hash::make('admin@12345'),
            ]);
        }
        if (!User::where('email', 'user@example.com')->exists()) {
            User::create([
                'username'          => 'user',
                'name'              => 'Jon',
                'email'             => 'user@example.com',
                'country_code'      => '+91',
                'mobile'            => '0123456789',
                'email_verified_at' => now(),
                'password'          => Hash::make('user@12345'),
            ]);
        }
    }
}
