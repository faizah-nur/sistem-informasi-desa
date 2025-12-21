<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kabar;
use Illuminate\Http\Request;

class KabarController extends Controller
{
    public function index(Request $request)
    {
        $query = Kabar::active();

        // 🔍 Search
        if ($request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('isi', 'like', '%' . $request->search . '%');
        }

        // 🏷️ Filter kategori
        if ($request->kategori && $request->kategori !== 'Semua') {
            $query->where('kategori', $request->kategori);
        }

        $kabar = $query
            ->orderBy('tanggal_publish', 'desc')
            ->paginate(6)
            ->withQueryString();

        // Ambil kategori unik
        $kategori = Kabar::select('kategori')->distinct()->pluck('kategori');

        return view('kabar.index', compact('kabar', 'kategori'));
    }

    public function show($slug)
    {
        $kabar = Kabar::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('kabar.show', compact('kabar'));
    }
}