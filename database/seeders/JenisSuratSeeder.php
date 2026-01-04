<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\JenisSurat;

class JenisSuratSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Surat Pengantar SKCK',
                'kode' => 'SKCK',
                'slug' => 'skck',
                'deskripsi' => 'Pengajuan online untuk pembuatan SKCK di kepolisian.',
                'aktif' => 1,
            ],
            [
                'nama' => 'Surat Keterangan Domisili',
                'kode' => 'DOM',
                'slug' => 'domisili',
                'deskripsi' => 'Untuk keperluan administrasi atau kebutuhan resmi lainnya.',
                'aktif' => 1,
            ],
            [
                'nama' => 'Surat Keterangan Tidak Mampu (SKTM)',
                'kode' => 'SKTM',
                'slug' => 'sktm',
                'deskripsi' => 'Pengajuan SKTM untuk pendidikan, kesehatan, atau bantuan.',
                'aktif' => 1,
            ],
            [
                'nama' => 'Surat Keterangan Usaha',
                'kode' => 'SKU',
                'slug' => 'sku',
                'deskripsi' => 'Layanan untuk warga yang ingin mengurus SKU.',
                'aktif' => 1,
            ],
        ];

        foreach ($data as $item) {
            JenisSurat::updateOrCreate( //Seeder saya dibuat idempotent menggunakan updateOrCreate agar aman dijalankan berulang kali.
                ['slug' => $item['slug']], // kunci unik
                $item
            );
        }
    }
}