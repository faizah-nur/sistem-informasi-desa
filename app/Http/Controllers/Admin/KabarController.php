<?php
namespace App\Http\Controllers\Admin;

use App\Models\Kabar;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class KabarController extends Controller
{
    public function index()
    {
        $data = Kabar::latest()->get();
        return view('admin.kabar.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kabar.create');
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'judul' => 'required|max:255',
        'gambar' => 'required|image|max:2048',
        'isi' => 'required',
        'kategori' => 'required|max:100',
        'tanggal_publish' => 'required|date',
        'is_popup' => 'nullable|boolean',
    ]);

    // checkbox handling (WAJIB)
    $validated['is_popup'] = $request->boolean('is_popup');
    $validated['is_active'] = $request->has('is_active');

    // slug & gambar
    $validated['slug'] = Str::slug($request->judul);
    $validated['gambar'] = $request->file('gambar')->store('kabar', 'public');

    Kabar::create($validated);

    return redirect()
        ->route('admin.kabar.index')
        ->with('success', 'Kabar berhasil ditambahkan');
}


    public function edit(Kabar $kabar)
    {
        return view('admin.kabar.edit', compact('kabar'));
    }

    public function update(Request $request, Kabar $kabar)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'gambar' => 'nullable|image|max:2048',
            'isi' => 'required',
            'kategori' => 'required|max:100',
            'tanggal_publish' => 'required|date',
            'is_popup' => 'nullable|boolean',
        ]);
        // pastikan checkbox selalu punya nilai
        $validated['is_popup'] = $request->boolean('is_popup');
        $validated['slug'] = Str::slug($request->judul);
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($kabar->gambar);
            $validated['gambar'] = $request->file('gambar')->store('kabar', 'public');
        }

        $kabar->update($validated);

        return redirect()
            ->route('admin.kabar.index')
            ->with('success', 'Kabar berhasil diperbarui');
    }

    public function destroy(Kabar $kabar)
    {
        Storage::disk('public')->delete($kabar->gambar);
        $kabar->delete();

        return back()->with('success', 'Kabar berhasil dihapus');
    }
}