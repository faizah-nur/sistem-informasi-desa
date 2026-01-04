<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgressPembangunan;

class ProgressPembangunanSeeder extends Seeder
{
    public function run(): void
    {
        if (app()->environment(['local', 'testing'])) {
            ProgressPembangunan::factory(1)->create();
        }
    }
}