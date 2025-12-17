<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengumuman;

class PengumumanSeeder extends Seeder
{
    public function run(): void
    {
        Pengumuman::insert([
            [
                'judul' => 'Jadwal Posyandu',
                'ringkasan' => 'Posyandu akan dilaksanakan pada Rabu, 12 Desember 2025 di Balai Dusun Sumberrejo pukul 08.00–11.00 WIB.',
                'isi' => 'Ibu hamil dan balita diharapkan hadir tepat waktu.',
                'tanggal' => '2025-12-12',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Lomba Agustusan',
                'ringkasan' => 'Memperingati Kemerdekaan RI, akan ada berbagai lomba pada 17 Agustus 2025 di Lapangan Desa.',
                'isi' => 'Pendaftaran dibuka sampai 10 Agustus di kantor desa.',
                'tanggal' => '2025-08-17',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Gangguan Air Bersih',
                'ringkasan' => 'Gangguan suplai air di wilayah RT 04–06 karena perbaikan jaringan.',
                'isi' => 'Diperkirakan normal kembali pada 8 Desember 2025 pukul 21.00 WIB.',
                'tanggal' => '2025-12-08',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Bantuan Sosial',
                'ringkasan' => 'Penyaluran BPNT Desember dilakukan pada 15 Desember 2025 di Balai Desa.',
                'isi' => 'Warga diminta membawa kartu identitas.',
                'tanggal' => '2025-12-15',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        // Pengumuman::factory(4)->create();
    }
}