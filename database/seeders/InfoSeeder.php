<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Info;
use Illuminate\Support\Str;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        Info::create([
            'judul' => 'Jadwal Posyandu Minggu Ini',
            'slug' => Str::slug('Jadwal Posyandu Minggu Ini'),
            'ringkasan' => 'Posyandu Balita dan Lansia dilaksanakan minggu ini.',
            'isi' => 'Posyandu Balita dan Lansia akan dilaksanakan pada hari Jumat, 15 Desember 2025 di Balai Desa.',
            'label' => 'Jadwal',
            'tanggal_posting' => '2025-12-12',
            'is_active' => true,
        ]);

        Info::create([
            'judul' => 'PAM: Informasi Gangguan Air Bersih',
            'slug' => Str::slug('PAM: Informasi Gangguan Air Bersih'),
            'ringkasan' => 'Gangguan sementara aliran air bersih.',
            'isi' => 'Aliran air akan terhenti sementara pada 13–14 Desember 2025 karena perbaikan pipa utama.',
            'label' => 'Urgent',
            'tanggal_posting' => '2025-12-11',
            'is_active' => true,
        ]);

        Info::create([
            'judul' => 'Penerimaan Bantuan Pangan 2025',
            'slug' => Str::slug('Penerimaan Bantuan Pangan 2025'),
            'ringkasan' => 'Informasi bantuan pangan untuk warga.',
            'isi' => 'Warga yang masuk daftar KPM dapat mengambil bantuan pangan mulai tanggal 20 Desember 2025 di Kantor Desa.',
            'label' => 'Bantuan',
            'tanggal_posting' => '2025-12-10',
            'is_active' => true,
        ]);
    }
}