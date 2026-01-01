<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run(): void
{
    DB::table('jenis_surats')->insert([
        [
            'nama' => 'Surat Pengantar SKCK',
            'slug' => 'skck',
            'kode' => 'SKCK',
            'deskripsi' => 'Pengajuan online untuk pembuatan SKCK di kepolisian.',
            'aktif' => true,
        ],
        [
            'nama' => 'Surat Keterangan Domisili',
            'slug' => 'domisili',
            'kode' => 'DOM',
            'deskripsi' => 'Untuk keperluan administrasi atau kebutuhan resmi lainnya.',
            'aktif' => true,
        ],
        [
            'nama' => 'Surat Keterangan Tidak Mampu (SKTM)',
            'slug' => 'sktm',
            'kode' => 'SKTM',
            'deskripsi' => 'Pengajuan SKTM untuk pendidikan, kesehatan, atau bantuan.',
            'aktif' => true,
        ],
        [
            'nama' => 'Surat Keterangan Usaha',
            'slug' => 'sku',
            'kode' => 'SKU',
            'deskripsi' => 'Layanan untuk warga yang ingin mengurus SKU.',
            'aktif' => true,
        ],
    ]);
}

}