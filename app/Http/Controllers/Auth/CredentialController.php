<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CredentialController extends Controller
{
    public function edit()
    {
        return view('auth.credentials');
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users,username,' . Auth::id(),
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->must_change_credentials = false;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Username dan password berhasil diperbarui.');
    }
}
