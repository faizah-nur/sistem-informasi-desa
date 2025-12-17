<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgressPembangunan;

class ProgressPembangunanSeeder extends Seeder
{
    public function run(): void
    {
        ProgressPembangunan::insert([
            [
                'judul_kegiatan' => 'Rehab Balai Desa',
                'deskripsi' => 'Pekerjaan renovasi balai desa sudah mencapai 80% dan saat ini memasuki tahap finishing interior serta pengecatan luar. Diharapkan selesai sepenuhnya dalam minggu ketiga bulan ini.',
                'persentase_progress' => 80,
                'status' => 'proses',
                'ikon' => 'building',
                'tanggal_mulai' => '2025-11-01',
                'tanggal_selesai' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_kegiatan' => 'Pembangunan Jalan Usaha Tani',
                'deskripsi' => 'Proyek pembangunan jalan usaha tani sepanjang 1,2 km telah 100% selesai. Jalan baru ini diharapkan mempermudah mobilitas petani dan distribusi hasil tani ke pasar.',
                'persentase_progress' => 100,
                'status' => 'selesai',
                'ikon' => 'road',
                'tanggal_mulai' => '2025-08-01',
                'tanggal_selesai' => '2025-10-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_kegiatan' => 'Renovasi Posyandu',
                'deskripsi' => 'Renovasi posyandu sedang berjalan dengan fokus pada perbaikan atap, pengecatan ulang, dan penyediaan ruang tunggu yang lebih nyaman. Ditargetkan selesai pada awal bulan depan.',
                'persentase_progress' => 50,
                'status' => 'proses',
                'ikon' => 'hospital',
                'tanggal_mulai' => '2025-12-01',
                'tanggal_selesai' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        // ProgressPembangunan::factory(3)->create();
    }
}