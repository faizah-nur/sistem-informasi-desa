<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TentangDesa>
 */
class TentangDesaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'judul' => 'Tentang Desa ' . $this->faker->city(),
            'deskripsi' => $this->faker->paragraphs(3, true),
            'gambar' => 'tentang/tentang-desa-' . $this->faker->numberBetween(1, 5) . '.jpg',
        ];
    }
}