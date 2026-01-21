<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminAccountController extends Controller
{
    public function edit()
    {
        return view('admin.account.edit', [
            'admin' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
            'username' => [
                'required',
                'string',
                Rule::unique('users', 'username')->ignore($admin->id),
            ],
            'current_password' => ['required'],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        // cek password lama
        if (! Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors([
                'current_password' => 'Password lama tidak sesuai.',
            ]);
        }

        // update username
        $admin->username = $request->username;

        // update password jika diisi
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return back()->with('success', 'Akun admin berhasil diperbarui.');
    }
}