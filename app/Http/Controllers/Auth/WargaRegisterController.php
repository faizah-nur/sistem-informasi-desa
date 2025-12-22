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
        return view('auth.register-warga'); // ✅ BENAR
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|digits:16|unique:wargas,nik',
            'nama_lengkap' => 'required|string|max:255',
            'umur' => 'required|integer|min:0',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'no_hp' => 'required',
            'status_pernikahan' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        // 1️⃣ SIMPAN KE WARGAS
        $warga = Warga::create([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'no_hp' => $request->no_hp,
            'status_pernikahan' => $request->status_pernikahan,
        ]);

        // 2️⃣ SIMPAN KE USERS (LOGIN)
        User::create([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'warga',
            'warga_id' => $warga->id, // jika ada relasi
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil');
    }
}