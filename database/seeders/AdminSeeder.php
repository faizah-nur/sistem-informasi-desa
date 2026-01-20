<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Desa',
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'nik' => '0000000000000000', // NIK khusus admin
                'must_change_credentials' => false,
            ]
        );
    }
}