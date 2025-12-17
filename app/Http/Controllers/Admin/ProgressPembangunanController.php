<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgressPembangunan;
use Illuminate\Http\Request;

class ProgressPembangunanController extends Controller
{
    public function index()
    {
        $data = ProgressPembangunan::latest()->get();

        return view('admin.progress_pembangunan.index', [
            'title' => 'Progress Pembangunan',
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('admin.progress_pembangunan.create', [
            'title' => 'Tambah Progress Pembangunan'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_kegiatan' => 'required|max:150',
            'deskripsi' => 'required',
            'persentase_progress' => 'required|integer|min:0|max:100',
            'status' => 'required|in:perencanaan,proses,selesai',
            'ikon' => 'nullable|string',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date',
        ]);

        ProgressPembangunan::create($validated);

        return redirect()
            ->route('admin.progress-pembangunan.index')
            ->with('success', 'Progress pembangunan berhasil ditambahkan');
    }

    public function edit(ProgressPembangunan $progress_pembangunan)
    {
        return view('admin.progress_pembangunan.edit', [
            'title' => 'Edit Progress Pembangunan',
            'data' => $progress_pembangunan
        ]);
    }

    public function update(Request $request, ProgressPembangunan $progress_pembangunan)
    {
        $validated = $request->validate([
            'judul_kegiatan' => 'required|max:150',
            'deskripsi' => 'required',
            'persentase_progress' => 'required|integer|min:0|max:100',
            'status' => 'required|in:perencanaan,proses,selesai',
            'ikon' => 'nullable|string',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date',
        ]);

        $progress_pembangunan->update($validated);

        return redirect()
            ->route('admin.progress-pembangunan.index')
            ->with('success', 'Progress pembangunan berhasil diperbarui');
    }

    public function destroy(ProgressPembangunan $progress_pembangunan)
    {
        $progress_pembangunan->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}