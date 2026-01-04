<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TentangDesa;

class TentangDesaSeeder extends Seeder
{
    public function run(): void
    {
        TentangDesa::create([
            'judul' => 'Sekilas Tentang Desa',
            'deskripsi' => 'Desa Lamongan adalah sebuah desa yang berkembang di wilayah Kecamatan Lamongan. Dengan masyarakat yang ramah, lingkungan yang asri, dan potensi pertanian yang kuat, desa ini terus berupaya meningkatkan kualitas hidup warganya melalui pembangunan berkelanjutan serta pelayanan publik yang lebih mudah diakses.',
            'gambar' => 'about.jpeg',
        ]);
    }
}