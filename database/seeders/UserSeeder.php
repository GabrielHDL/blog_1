<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.test',
            'password' => bcrypt('123456'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Valery',
            'email' => 'valery@test.test',
            'password' => bcrypt('123456'),
        ])->assignRole('Blogger');
        User::create([
            'name' => 'Denisse',
            'email' => 'denisse@test.test',
            'password' => bcrypt('123456'),
        ])->assignRole('Blogger');
    }
}
