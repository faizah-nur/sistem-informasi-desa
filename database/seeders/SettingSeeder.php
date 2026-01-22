<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'site_name'          => 'Sistem Informasi Desa Lamongan',
            'nama_desa'          => 'Lamongan',
            'nama_kecamatan'     => 'Lamongan',
            'nama_kabupaten'     => 'Lamongan',
            'alamat_desa'        => 'Jl. Raya Lamongan No. 12',
            'telepon_desa'       => '081334125113',
            'email_desa'         => 'desa.lamongan@mail.com',
            'jam_layanan'        => '08.00 – 15.00 WIB',
            'google_maps'        => null,

            'nama_kepala_desa'   => 'NAMA KEPALA DESA',
            'nip_kepala_desa'    => null,

            'site_logo'          => null,
        ];

        foreach ($defaults as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}