<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;

class PengajuanSuratAdminController extends Controller
{
    public function index()
    {
        $pengajuans = PengajuanSurat::with(['user', 'jenisSurat'])
            ->latest()
            ->get();

        return view('admin.layanan-desa.index', compact('pengajuans'));
    }

    public function show(PengajuanSurat $pengajuan)
    {
        $pengajuan->load(['user', 'jenisSurat', 'details']);

        return view('admin.layanan-desa.show', compact('pengajuan'));
    }

    public function update(Request $request, PengajuanSurat $pengajuan)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,ditolak,selesai',
            'catatan_admin' => 'nullable|string'
        ]);

        $pengajuan->update($request->only('status', 'catatan_admin'));

        return back()->with('success', 'Pengajuan berhasil diperbarui');
    }
}