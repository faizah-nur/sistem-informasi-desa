<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Warga;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nik' => '3201010101010001',
                'nama_lengkap' => 'Nur Faizah',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1999-08-28',
                'umur' => 22,
                'agama' => 'Islam',
                'status_pernikahan' => 'Belum Kawin',
                'pekerjaan' => 'Mahasiswa',
                'kewarganegaraan' => 'Indonesia',
                'alamat' => 'Desa Sukamaju RT 01 RW 02',
                'no_hp' => '081234567890',
                'aktif' => 1,
            ],
        ];

        foreach ($data as $item) {
            Warga::updateOrCreate(
                ['nik' => $item['nik']], // kunci unik
                $item
            );
        }
    }
}