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
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'zaky@admin.com',
                'password' => Hash::make('admin'),
                'role' => 'admin'
            ],
            [
                'name' => 'Petugas',
                'email' => 'fathur@petugas.com',
                'password' => Hash::make('petugas'),
                'role' => 'petugas'
            ]
        ]);
    }
}
