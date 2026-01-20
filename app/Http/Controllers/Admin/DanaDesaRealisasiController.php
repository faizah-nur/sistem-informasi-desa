<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanaDesaRealisasi;
use Illuminate\Http\Request;

class DanaDesaRealisasiController extends Controller
{
    public function index()
    {
        $data = DanaDesaRealisasi::orderBy('tanggal', 'desc')->get();
        return view('admin.dana_desa.index', compact('data'));
    }

    public function create()
    {
        return view('admin.dana_desa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|digits:4',
            'nama_kegiatan' => 'required|string',
            'anggaran' => 'required|numeric',
            'realisasi' => 'required|numeric',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        DanaDesaRealisasi::create($request->all());

        return redirect()
            ->route('admin.dana-desa.index')
            ->with('success', 'Realisasi dana berhasil ditambahkan');
    }

    // ==================== EDIT & UPDATE ====================

    public function edit(DanaDesaRealisasi $dana_desa_realisasi)
    {
        return view('admin.dana_desa.edit', compact('dana_desa_realisasi'));
    }

    public function update(Request $request, DanaDesaRealisasi $dana_desa_realisasi)
    {
        $request->validate([
            'tahun' => 'required|digits:4',
            'nama_kegiatan' => 'required|string',
            'anggaran' => 'required|numeric',
            'realisasi' => 'required|numeric',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $dana_desa_realisasi->update($request->all());

        return redirect()
            ->route('admin.dana-desa.index')
            ->with('success', 'Realisasi dana berhasil diperbarui');
    }
}