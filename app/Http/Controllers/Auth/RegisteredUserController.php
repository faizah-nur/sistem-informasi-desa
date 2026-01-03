<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nik' => ['required', 'digits:16', 'unique:users,nik'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 🔍 Cari data warga berdasarkan NIK
        $warga = Warga::where('nik', $request->nik)->first();

        if (!$warga) {
            return back()->withErrors([
                'nik' => 'NIK tidak terdaftar sebagai warga desa!!'
            ]);
        }

        // ✅ Buat user dari data warga (BUKAN dari input)
        $user = User::create([
            'nik' => $warga->nik,
            'name' => $warga->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'warga',
        ]);
        // new
        event(new Registered($user));

        Auth::login($user);

        // ⬅️ WAJIB ke verification notice
        return redirect()->route('verification.notice');

    }
}