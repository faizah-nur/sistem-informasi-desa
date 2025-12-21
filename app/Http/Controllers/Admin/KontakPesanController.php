<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontakPesan;

class KontakPesanController extends Controller
{
    public function index()
    {
        return view('admin.kontak.index', [
            'pesans' => KontakPesan::latest()->get()
        ]);
    }

    public function show(KontakPesan $kontakPesan)
    {
        $kontakPesan->update(['is_read' => true]);

        return view('admin.kontak.show', compact('kontakPesan'));
    }

    public function destroy(KontakPesan $kontakPesan)
    {
        $kontakPesan->delete();
        return redirect()->route('admin.kontak.index')
            ->with('success', 'Pesan dihapus');
    }
}