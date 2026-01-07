<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanMessageController extends Controller
{
    public function store(Request $request, $pengajuanId)
    {
        $request->validate([
            'pesan' => 'required|string|max:1000',
        ]);

        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $user = Auth::user();

        // Tentukan role pengirim (SESUIAI ENUM)
        $senderRole = $user->role === 'admin' ? 'admin' : 'warga';

        // Keamanan: warga hanya boleh kirim pesan ke pengajuan miliknya
        if ($senderRole === 'warga' && $pengajuan->user_id !== $user->id) {
            abort(403, 'Tidak diizinkan');
        }

        $pengajuan->messages()->create([
            'user_id'     => $user->id,
            'sender_role' => $senderRole,
            'pesan'       => $request->pesan,
        ]);

        return back()->with('success', 'Pesan berhasil dikirim');
    }
}