<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            [
                'nama'       => 'Agung Kurniawan',
                'username'   => 'admin',
                'password'   => \Illuminate\Support\Facades\Hash::make('admin123'),
                'role'       => 'admin',
                'created_at' => now(),
            ],
            [
                'nama'       => 'Muhammad Fadla Al Fadillah',
                'username'   => 'fadla',
                'password'   => \Illuminate\Support\Facades\Hash::make('password'),
                'role'       => 'petugas',
                'created_at' => now(),
            ],
            [
                'nama'       => 'Eka Ramadhani',
                'username'   => 'eka',
                'password'   => \Illuminate\Support\Facades\Hash::make('password'),
                'role'       => 'petugas',
                'created_at' => now(),
            ],
            [
                'nama'       => 'Naya Namira Salwa Putri',
                'username'   => 'naya',
                'password'   => \Illuminate\Support\Facades\Hash::make('password'),
                'role'       => 'petugas',
                'created_at' => now(),
            ],
            [
                'nama'       => 'Siti Aisyah',
                'username'   => 'aisyah',
                'password'   => \Illuminate\Support\Facades\Hash::make('password'),
                'role'       => 'petugas',
                'created_at' => now(),
            ],
        ]);
    }
}
