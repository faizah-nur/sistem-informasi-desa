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
            'judul' => $this->faker->sentence(3),
            'deskripsi' => $this->faker->sentence(10),
            'gambar' => 'images/dummy-galeri/' . $this->faker->numberBetween(1, 5) . '.jpg',
            'kategori' => $this->faker->randomElement([
                'Kegiatan', 'Pembangunan', 'Fasilitas Desa'
            ]),
            'is_active' => true,
        ];
    }
}