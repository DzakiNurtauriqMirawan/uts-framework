<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; // Perbaikan: Tambahkan ini agar class Seeder dikenal
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'kinur@gmail.com',
                'password' => Hash::make('123'), // Gunakan Hash untuk password
                'role' => 'admin',
            ],
            [
                'name' => 'User',
                'email' => 'allyya@gmail.com',
                'password' => Hash::make('321'), // Gunakan Hash untuk password
                'role' => 'user',
            ]
        ]);
    }
}
