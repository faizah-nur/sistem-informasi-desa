<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $data = Pengumuman::latest()->paginate(10);

        return view('admin.pengumuman.index', [
            'title' => 'Pengumuman',
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('admin.pengumuman.create', [
            'title' => 'Tambah Pengumuman'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required',
            'isi' => 'nullable',
            'tanggal' => 'required|date',
            'is_published' => 'boolean',
        ]);

        Pengumuman::create($validated);

        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan');
    }

    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit', [
            'title' => 'Edit Pengumuman',
            'pengumuman' => $pengumuman
        ]);
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required',
            'isi' => 'nullable',
            'tanggal' => 'required|date',
            'is_published' => 'boolean',
        ]);
        $validated['is_published'] = $request->has('is_published');
        $pengumuman->update($validated);

        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus');
    }
}