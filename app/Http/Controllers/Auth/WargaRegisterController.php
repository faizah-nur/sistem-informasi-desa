<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class WargaRegisterController extends Controller
{
    public function show()
    {
        return view('auth.register-warga');
    }

public function store(Request $request)
{
    $request->validate([
        'nik' => 'required|digits:16',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ],
        [
        'password.confirmed' => 'Konfirmasi password tidak sesuai.',
    ]);

    $warga = Warga::where('nik', $request->nik)->first();

    if (!$warga) {
        return back()->withErrors([
            'nik' => 'NIK tidak terdaftar sebagai warga'
        ]);
    }

    $user = User::create([
        'name'     => $warga->nama_lengkap,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'nik'      => $warga->nik,
        'role'     => 'warga',
    ]);

    // 🔥 WAJIB
    event(new Registered($user));

    Auth::login($user);

    return redirect()->route('verification.notice');
}
  
}