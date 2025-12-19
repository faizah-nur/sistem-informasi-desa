<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kabar;
use Illuminate\Support\Str;

class KabarSeeder extends Seeder
{
    public function run(): void
    {
        Kabar::create([
            'judul' => 'Gotong Royong Bersama Warga',
            'slug' => Str::slug('Gotong Royong Bersama Warga'),
            'gambar' => 'pengumuman.jpeg',
            'isi' => 'Warga melaksanakan gotong royong membersihkan lingkungan desa secara bersama-sama.',
            'kategori' => 'Kegiatan',
            'tanggal_publish' => '2025-12-10',
            'is_active' => true,
        ]);

        Kabar::create([
            'judul' => 'Progress Pembangunan Jalan',
            'slug' => Str::slug('Progress Pembangunan Jalan'),
            'gambar' => 'about.jpeg',
            'isi' => 'Pembangunan jalan usaha tani telah mencapai 100% dan siap digunakan warga.',
            'kategori' => 'Pembangunan',
            'tanggal_publish' => '2025-12-08',
            'is_active' => true,
        ]);
    }
}