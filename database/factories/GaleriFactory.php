<?php

namespace Database\Factories;

use App\Models\Galeri;
use Illuminate\Database\Eloquent\Factories\Factory;

class GaleriFactory extends Factory
{
    protected $model = Galeri::class;

    public function definition(): array
    {
        return [
            'judul' => 'Kegiatan ' . $this->faker->words(2, true),
            'deskripsi' => $this->faker->sentence(10),
            'gambar' => 'galeri/galeri-' . $this->faker->numberBetween(1, 6) . '.jpg',
            'kategori' => $this->faker->randomElement([
                'Kegiatan Desa',
                'Pembangunan',
                'Pelayanan',
                'Masyarakat',
            ]),
            'is_active' => true,
        ];
    }
}