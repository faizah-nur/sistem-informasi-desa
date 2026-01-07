<?php

namespace Database\Factories;

use App\Models\Pengumuman;
use Illuminate\Database\Eloquent\Factories\Factory;

class PengumumanFactory extends Factory
{
    protected $model = Pengumuman::class;

    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(5),
            'isi' => $this->faker->paragraph(2),
            'tanggal' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'is_published' => true,
        ];
    }
}