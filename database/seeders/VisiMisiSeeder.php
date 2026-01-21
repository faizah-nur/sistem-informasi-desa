<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\visiMisi;

class VisiMisiSeeder extends Seeder
{
    public function run(): void
    {
        visiMisi::create([
            'visi' => 'Menjadikan desa sebagai wilayah yang maju, mandiri, dan berdaya saing dengan berlandaskan nilai-nilai kebersamaan, transparansi, serta pelayanan publik yang berkualitas guna meningkatkan kesejahteraan seluruh masyarakat desa secara berkelanjutan.',
            'misi' => 'Mewujudkan tata kelola pemerintahan desa yang profesional, akuntabel, dan partisipatif melalui peningkatan kualitas pelayanan kepada masyarakat, pengembangan potensi lokal desa, serta pemberdayaan sumber daya manusia agar tercipta kehidupan sosial, ekonomi, dan lingkungan yang harmonis.',
            'gambar' => 'about.jpeg',
        ]);
    }
}