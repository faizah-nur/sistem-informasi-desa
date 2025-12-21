<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\KontakPesan;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('kontak.index', [
            'title' => 'Kontak Desa'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'pesan' => 'required|string',
        ]);

        KontakPesan::create($request->all());

        return back()->with('success', 'Pesan berhasil dikirim.');
    }
}