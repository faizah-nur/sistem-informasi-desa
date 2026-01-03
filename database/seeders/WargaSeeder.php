<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
DB::table('wargas')->insert([
    [
        'nik' => '3201010101010001',
        'nama_lengkap' => 'Nur Faizah',
        'jenis_kelamin' => 'P',
        'umur' => 25,
        'tempat_lahir' => 'Bandung',
        'tanggal_lahir' => '1999-08-28',
        'alamat' => 'Desa Sukamaju RT 01 RW 02',
        'agama' => 'Islam',
        'pekerjaan' => 'Mahasiswa',
        'no_hp' => '081234567890',
        'status_pernikahan' => 'Belum Kawin',
        'kewarganegaraan' => 'Indonesia',
        'aktif' => true,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nik' => '3201010101010009',
        'nama_lengkap' => 'Andina Fitri',
        'jenis_kelamin' => 'P',
        'umur' => 25,
        'tempat_lahir' => 'Babat',
        'tanggal_lahir' => '1999-08-28',
        'alamat' => 'Desa Sumlaran RT 01 RW 02',
        'agama' => 'Islam',
        'pekerjaan' => 'Mahasiswa',
        'no_hp' => '081234567890',
        'status_pernikahan' => 'Belum Kawin',
        'kewarganegaraan' => 'Indonesia',
        'aktif' => true,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    
]);

}

}