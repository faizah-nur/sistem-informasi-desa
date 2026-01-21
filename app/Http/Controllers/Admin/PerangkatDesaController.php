<?php

namespace App\Http\Controllers\Admin;

// use Storage;
use Illuminate\Http\Request;
use App\Models\PerangkatDesa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class PerangkatDesaController extends Controller
{
    public function index()
    {
        $data = PerangkatDesa::orderBy('nama')->get();
        return view('admin.perangkat.index', compact('data'));
    }

    public function create()
    {
        return view('admin.perangkat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('perangkat', 'public');
        }

        PerangkatDesa::create($data);

        return redirect()
            ->route('admin.perangkat.index')
            ->with('success', 'Perangkat desa berhasil ditambahkan');
    }

    public function edit(PerangkatDesa $perangkat)
    {
        return view('admin.perangkat.edit', compact('perangkat'));
    }

    public function update(Request $request, PerangkatDesa $perangkat)
    {
        $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // hapus foto lama kalau ada
            if ($perangkat->foto) {
                Storage::disk('public')->delete($perangkat->foto);
            }
            $data['foto'] = $request->file('foto')->store('perangkat', 'public');
        }

        $perangkat->update($data);

        return redirect()
            ->route('admin.perangkat.index')
            ->with('success', 'Perangkat desa berhasil diperbarui');
    }

    public function destroy(PerangkatDesa $perangkat)
    {
        if ($perangkat->foto) {
            Storage::disk('public')->delete($perangkat->foto);
        }

        $perangkat->delete();

        return redirect()
            ->route('admin.perangkat.index')
            ->with('success', 'Perangkat desa berhasil dihapus');
    }
}