<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\SuratDataMapper;
use App\Services\GenerateNomorSurat;
use Illuminate\Support\Facades\DB;

class PengajuanSuratAdminController extends Controller
{
    public function index()
    {
        $pengajuans = PengajuanSurat::with('user', 'jenisSurat')
            ->latest()
            ->paginate(10);

        return view('admin.layanan.index', compact('pengajuans'));
    }

    public function show(PengajuanSurat $pengajuan)
    {
        $pengajuan->load('user', 'jenisSurat', 'details');

        return view('admin.layanan.show', compact('pengajuan'));
    }

    public function update(Request $request, PengajuanSurat $pengajuan)
    {
        $request->validate([
            'status' => 'required|in:diproses,ditolak',
            'catatan_admin' => 'nullable|string',
        ]);

        $pengajuan->update([
            'status' => $request->status,
            'catatan_admin' => $request->catatan_admin,
        ]);

        return back()->with('success', 'Status pengajuan diperbarui');
    }

    /**
     * ✅ PDF ADMIN
     * - HANYA untuk surat yang SUDAH SELESAI
     * - TIDAK membuat nomor surat
     */
    public function exportPdf(PengajuanSurat $pengajuan)
    {
        if ($pengajuan->status !== 'selesai') {
            abort(403, 'Surat belum disahkan');
        }

        if (!$pengajuan->nomor_surat) {
            abort(500, 'Nomor surat tidak ditemukan');
        }

        $pengajuan->load(['jenisSurat', 'details', 'warga']);

        $data = SuratDataMapper::map($pengajuan);

        return Pdf::loadView('pengajuan.pdf', [
            'pengajuan' => $pengajuan,
            'data'      => $data,
        ])->stream(
            'surat-' . $pengajuan->nomor_surat . '.pdf'
        );
    }

    /**
     * ✅ FINAL & AMAN
     * - Nomor surat dibuat DI SINI
     * - Pakai transaction
     * - Anti race condition
     */
    public function selesai(PengajuanSurat $pengajuan)
    {
        DB::transaction(function () use ($pengajuan) {

            // 🔒 Idempotent: jangan buat ulang
            if ($pengajuan->nomor_surat) {
                return;
            }

            $pengajuan->update([
                'nomor_surat'   => GenerateNomorSurat::make($pengajuan),
                'tanggal_surat' => now(),
                'status'        => 'selesai',
            ]);
        });

        return back()->with('success', 'Surat berhasil disahkan dan diberi nomor');
    }
}