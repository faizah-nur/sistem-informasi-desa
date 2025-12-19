<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InfoController extends Controller
{
    public function index()
    {
        $data = Info::latest()->get();
        return view('admin.info.index', compact('data'));
    }

    public function create()
    {
        return view('admin.info.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'ringkasan' => 'required',
            'isi' => 'required',
            'label' => 'required|max:50',
            'tanggal_posting' => 'required|date',
        ]);

        $validated['slug'] = Str::slug($request->judul);
        $validated['is_active'] = $request->has('is_active');

        Info::create($validated);

        return redirect()
            ->route('admin.info.index')
            ->with('success', 'Info berhasil ditambahkan');
    }

    public function edit(Info $info)
    {
        return view('admin.info.edit', compact('info'));
    }

    public function update(Request $request, Info $info)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'ringkasan' => 'required',
            'isi' => 'required',
            'label' => 'required|max:50',
            'tanggal_posting' => 'required|date',
        ]);

        $validated['slug'] = Str::slug($request->judul);
        $validated['is_active'] = $request->has('is_active');

        $info->update($validated);

        return redirect()
            ->route('admin.info.index')
            ->with('success', 'Info berhasil diperbarui');
    }

    public function destroy(Info $info)
    {
        $info->delete();
        return back()->with('success', 'Info berhasil dihapus');
    }
}