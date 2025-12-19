<?php

namespace Database\Seeders;

use App\Models\Info;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            AdminSeeder::class,
            TentangDesaSeeder::class,
            PengumumanSeeder::class,
            GaleriSeeder::class,
            ProgressPembangunanSeeder::class,
            // halaman kabar
            KabarSeeder::class,
            InfoSeeder::class,
            // layanan
            JenisSuratSeeder::class,
    ]);
    }
}