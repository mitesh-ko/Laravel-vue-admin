<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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
            $user = User::create([
                'username'          => 'admin',
                'name'              => 'Admin',
                'email'             => 'admin@example.com',
                'phone'             => '1234567890',
                'email_verified_at' => now(),
                'password'          => Hash::make('admin@12345'),
            ]);
            $role = Role::where('name', 'Super User')->first();
            $user->assignRole($role);
        }
        if (!User::where('email', 'user@example.com')->exists()) {
            $user = User::create([
                'username'          => 'user',
                'name'              => 'Jon',
                'email'             => 'user@example.com',
                'phone'             => '0123456789',
                'email_verified_at' => now(),
                'password'          => Hash::make('user@12345'),
            ]);
            $role = Role::where('name', 'Public User')->first();
            $user->assignRole($role);
        }
    }
}
