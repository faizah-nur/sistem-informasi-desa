<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TentangDesa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class TentangDesaController extends Controller
{
public function index()
{
    $data = TentangDesa::first();

    return view('admin.tentang-desa.index', [
        'title' => 'Tentang Desa',
        'data' => $data
    ]);
}

public function edit()
{
    $data = TentangDesa::firstOrFail();

    return view('admin.tentang-desa.edit', [
        'title' => 'Edit Tentang Desa',
        'data' => $data
    ]);
}

public function update(Request $request)
{
    $data = TentangDesa::firstOrFail();

    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required',
        'gambar' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
        if ($data->gambar) {
            Storage::disk('public')->delete($data->gambar);
        }

        $validated['gambar'] = $request->file('gambar')
            ->store('tentang-desa', 'public');
    }

    $data->update($validated);

    return redirect()
        ->route('admin.tentang-desa.index')
        ->with('success', 'Tentang Desa berhasil diperbarui');
}
}