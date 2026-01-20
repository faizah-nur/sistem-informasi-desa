<?php

namespace App\Observers;

use App\Models\Warga;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class WargaObserver
{
    /**
     * Handle the Warga "created" event.
     */
    public function created(Warga $warga): void
    {
        // create corresponding user account with default username and password = NIK
        User::updateOrCreate(
            ['nik' => $warga->nik],
            [
                'name' => $warga->nama_lengkap,
                'email' => $warga->nik.'@warga.local',
                'username' => $warga->nik,
                'password' => Hash::make($warga->nik),
                'role' => 'warga',
                'must_change_credentials' => true,
            ]
        );
    }

    /**
     * Handle the Warga "updated" event.
     */
    public function updated(Warga $warga): void
    {
        // keep user's password intact on updates; update name/email/username if missing or changed
        $user = User::where('nik', $warga->nik)->first();
        if ($user) {
            $user->name = $warga->nama_lengkap;
            if (! $user->username) {
                $user->username = $warga->nik;
            }
            if (! $user->email) {
                $user->email = $warga->nik.'@warga.local';
            }
            $user->save();
        } else {
            // if user doesn't exist (edge case), create with default password
            User::updateOrCreate(
                ['nik' => $warga->nik],
                [
                    'name' => $warga->nama_lengkap,
                    'email' => $warga->nik.'@warga.local',
                    'username' => $warga->nik,
                    'password' => Hash::make($warga->nik),
                    'role' => 'warga',
                    'must_change_credentials' => true,
                ]
            );
        }
    }
}
