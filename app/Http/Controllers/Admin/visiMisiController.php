<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\visiMisi;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class visiMisiController extends Controller
{
public function index()
{
    $data = visiMisi::first();

    return view('admin.visi_misi.index', [
        'title' => 'Visi Misi',
        'data' => $data
    ]);
}

public function edit()
{
    $data = visiMisi::firstOrFail();

    return view('admin.visi_misi.edit', [
        'title' => 'Edit Visi Misi',
        'data' => $data
    ]);
}

public function update(Request $request)
{
    $data = visiMisi::firstOrFail();

    $validated = $request->validate([
        'visi' => 'required',
        'misi' => 'required',
        'gambar' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
        if ($data->gambar) {
            Storage::disk('public')->delete($data->gambar);
        }

        $validated['gambar'] = $request->file('gambar')
            ->store('visi_misis', 'public');
    }

    $data->update($validated);

    return redirect()
        ->route('admin.visi_misi.index')
        ->with('success', 'Visi Misi Desa berhasil diperbarui');
}
}