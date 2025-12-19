<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        Galeri::insert([
            [
                'judul' => 'Balai Desa Sukamaju',
                'deskripsi' => 'Tampak depan balai desa sebagai pusat kegiatan masyarakat.',
                'gambar' => '1.jpeg',
                'kategori' => 'Fasilitas Desa',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kegiatan Posyandu',
                'deskripsi' => 'Pelayanan kesehatan rutin untuk balita dan ibu hamil.',
                'gambar' => '2.jpeg',
                'kategori' => 'Kesehatan',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pembangunan Jalan Desa',
                'deskripsi' => 'Progres pembangunan jalan usaha tani.',
                'gambar' => '3.jpeg',
                'kategori' => 'Pembangunan',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Lomba Agustusan',
                'deskripsi' => 'Antusias warga dalam memeriahkan HUT RI.',
                'gambar' => '4.jpeg',
                'kategori' => 'Kegiatan',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Lomba Agustusan',
                'deskripsi' => 'Antusias warga dalam memeriahkan HUT RI.',
                'gambar' => '10.jpeg',
                'kategori' => 'Kegiatan',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Lomba Agustusan',
                'deskripsi' => 'Antusias warga dalam memeriahkan HUT RI.',
                'gambar' => 'galeri/5.jpeg',
                'kategori' => 'Kegiatan',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Lomba Agustusan',
                'deskripsi' => 'Antusias warga dalam memeriahkan HUT RI.',
                'gambar' => '6.jpeg',
                'kategori' => 'Kegiatan',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Lomba Agustusan',
                'deskripsi' => 'Antusias warga dalam memeriahkan HUT RI.',
                'gambar' => '7.jpeg',
                'kategori' => 'Kegiatan',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Lomba Agustusan',
                'deskripsi' => 'Antusias warga dalam memeriahkan HUT RI.',
                'gambar' => '8.jpeg',
                'kategori' => 'Kegiatan',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Lomba Agustusan',
                'deskripsi' => 'Antusias warga dalam memeriahkan HUT RI.',
                'gambar' => '9.jpeg',
                'kategori' => 'Kegiatan',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        // Galeri::factory(10)->create();
    }
}