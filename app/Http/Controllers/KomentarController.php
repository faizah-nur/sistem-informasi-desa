<?php

namespace App\Http\Controllers;

use App\Models\Kabar;
use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function store(Request $request, Kabar $kabar)
    {
        $request->validate([
            'isi' => 'required|min:3'
        ]);

        $kabar->komentars()->create([
            'user_id' => auth()->id(),
            'isi' => $request->isi,
        ]);

        return back();
    }

public function destroy(Komentar $komentar)
{
    // 🔐 Authorization manual (simple & jelas)
    if (!auth()->user()->isAdmin()) {
        abort(403, 'Tidak punya akses');
    }

    $komentar->delete();

    return back()->with('success', 'Komentar berhasil dihapus');
}

}