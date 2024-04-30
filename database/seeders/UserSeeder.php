<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'name' => 'Gita',
                'email' => 'gita@gmail.com',
                'password' => Hash::make('gita123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Gita2',
                'email' => 'gita2@gmail.com',
                'password' => Hash::make('gita123'),
                'email_verified_at' => now(),
            ],
        ];

        DB::table('users')->insert($posts);
    }
}
