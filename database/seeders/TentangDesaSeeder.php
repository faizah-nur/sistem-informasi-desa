<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TentangDesa;

class TentangDesaSeeder extends Seeder
{
    public function run(): void
    {
        TentangDesa::truncate();

        TentangDesa::create([
            'judul' => 'Tentang Desa Kami',
            'deskripsi' => 'Desa kami merupakan desa yang terus berkembang dengan menjunjung nilai gotong royong, transparansi, dan pelayanan kepada masyarakat.',
            'gambar' => 'tentang/tentang-desa.jpg',
        ]);
    }
}