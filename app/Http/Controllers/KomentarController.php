<?php

namespace App\Http\Controllers;

use App\Models\Kabar;
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
}