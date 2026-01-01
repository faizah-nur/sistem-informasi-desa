<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KabarFactory extends Factory
{
    public function definition(): array
    {
        $judul = $this->faker->sentence(4);

        return [
            'judul' => $judul,
            'slug' => Str::slug($judul),
            'gambar' => 'images/dummy-kabar/' . $this->faker->numberBetween(1, 3) . '.jpg',
            'isi' => $this->faker->paragraph(4),
            'kategori' => $this->faker->randomElement([
                'Kegiatan', 'Pembangunan', 'Informasi'
            ]),
            'tanggal_publish' => $this->faker->date(),
            'is_active' => true,
        ];
    }
}