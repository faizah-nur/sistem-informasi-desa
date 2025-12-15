<?php
namespace Database\Factories;

use App\Models\ProgressPembangunan;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgressPembangunanFactory extends Factory
{
    protected $model = ProgressPembangunan::class;

    public function definition(): array
    {
        $persentase = $this->faker->numberBetween(0, 100);

        return [
            'judul_kegiatan' => $this->faker->sentence(3),
            'deskripsi' => $this->faker->paragraph(),
            'persentase_progress' => $persentase,
            'status' => $persentase == 100 ? 'selesai' : 'proses',
            'ikon' => $this->faker->randomElement([
                'balai-desa.svg',
                'jalan.svg',
                'irigasi.svg',
            ]),
            'tanggal_mulai' => $this->faker->date(),
            'tanggal_selesai' => $persentase == 100 ? $this->faker->date() : null,
        ];
    }
}