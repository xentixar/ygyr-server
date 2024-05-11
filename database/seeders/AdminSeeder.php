<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        if (!User::query()->where('email', 'admin@admin.com')->exists()) {
            User::query()->create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('Password12@'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]);
        }
    }
}
