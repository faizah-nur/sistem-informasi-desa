<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;



class WargaRegisterController extends Controller
{
    public function show()
    {
        return view('auth.register-warga'); // ⬅️ INI PENTING
    }

    public function store(Request $request)
    {
    $request->validate([
        'nik' => 'required|digits:16',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
    ]);

    $warga = Warga::where('nik', $request->nik)->first();

    if (!$warga) {
    return back()->withErrors([
        'nik' => 'NIK tidak terdaftar sebagai warga'
    ]);
    }



User::create([
    'name'     => $warga->nama_lengkap,
    'email'    => $request->email,
    'password' => Hash::make($request->password),
    'nik'      => $warga->nik,
]);

        

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil. Silakan login.');
    }
}