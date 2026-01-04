<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kabar;
use Illuminate\Support\Str;

class KabarSeeder extends Seeder
{
    public function run(): void
    {
        if (app()->environment(['local', 'testing'])) {
            Kabar::factory(2)->create();
        }
    }
}