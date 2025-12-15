<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgressPembangunan;

class ProgressPembangunanSeeder extends Seeder
{
    public function run(): void
    {
        ProgressPembangunan::truncate();
        // ProgressPembangunan::create([
        //     'judul_kegiatan' => 'Rehab Balai Desa',
        //     'deskripsi' => 'Pekerjaan renovasi balai desa sudah mencapai 80% dan saat ini memasuki tahap finishing interior serta pengecatan luar.',
        //     'persentase_progress' => 80,
        //     'status' => 'proses',
        //     'ikon' => 'balai-desa.svg',
        //     'tanggal_mulai' => '2025-11-01',
        // ]);

        // ProgressPembangunan::create([
        //     'judul_kegiatan' => 'Pembangunan Jalan Usaha Tani',
        //     'deskripsi' => 'Proyek pembangunan jalan usaha tani sepanjang 1,2 km telah 100% selesai dan siap digunakan.',
        //     'persentase_progress' => 100,
        //     'status' => 'selesai',
        //     'ikon' => 'jalan.svg',
        //     'tanggal_mulai' => '2025-09-01',
        //     'tanggal_selesai' => '2025-10-15',
        // ]);

        // Data dummy tambahan (opsional)
        ProgressPembangunan::factory(3)->create();
    }
}