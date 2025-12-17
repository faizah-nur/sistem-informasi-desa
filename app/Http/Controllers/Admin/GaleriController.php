<?php
namespace App\Http\Controllers\Admin;
use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
{
    $data = Galeri::latest()->get();
    return view('admin.galeri.index', compact('data'));
}
public function create()
{
    return view('admin.galeri.create');
}
public function store(Request $request)
{
    $validated = $request->validate([
        'judul' => 'required|max:255',
        'deskripsi' => 'nullable',
        'gambar' => 'required|image|max:2048',
        'kategori' => 'nullable|max:100',
    ]);

    $validated['gambar'] = $request->file('gambar')
        ->store('galeri', 'public');

    $validated['is_active'] = $request->has('is_active');

    Galeri::create($validated);

    return redirect()
        ->route('admin.galeri.index')
        ->with('success', 'Galeri berhasil ditambahkan');
}
public function edit(Galeri $galeri)
{
    return view('admin.galeri.edit', compact('galeri'));
}
public function update(Request $request, Galeri $galeri)
{
    $validated = $request->validate([
        'judul' => 'required|max:255',
        'deskripsi' => 'nullable',
        'gambar' => 'nullable|image|max:2048',
        'kategori' => 'nullable|max:100',
    ]);

    if ($request->hasFile('gambar')) {
        Storage::disk('public')->delete($galeri->gambar);
        $validated['gambar'] = $request->file('gambar')
            ->store('galeri', 'public');
    }

    $validated['is_active'] = $request->has('is_active');

    $galeri->update($validated);

    return redirect()
        ->route('admin.galeri.index')
        ->with('success', 'Galeri berhasil diperbarui');
}
public function destroy(Galeri $galeri)
{
    Storage::disk('public')->delete($galeri->gambar);
    $galeri->delete();

    return back()->with('success', 'Galeri berhasil dihapus');
}



}