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
        $pengajuans = PengajuanSurat::with([
            'user.warga',
            'jenisSurat',
            'files',
        ])
        ->latest()
        ->paginate(10);

        return view('admin.layanan.index', compact('pengajuans'));
    }

    public function show(PengajuanSurat $pengajuan)
    {
        $pengajuan->load([
            'user.warga',
            'jenisSurat',
            'details',
            'files',

            // chat messages (urut lama → baru)
            'messages' => function ($q) {
                $q->oldest()->with('user');
            },
        ]);

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

    public function exportPdf(PengajuanSurat $pengajuan)
    {
        if ($pengajuan->status !== 'selesai') {
            abort(403, 'Surat belum disahkan');
        }

        if (!$pengajuan->nomor_surat) {
            abort(500, 'Nomor surat tidak ditemukan');
        }

        $pengajuan->load(['jenisSurat', 'details', 'user.warga']);

        $data = SuratDataMapper::map($pengajuan);

        $safeNomorSurat = str_replace(['/', '\\'], '-', $pengajuan->nomor_surat);

        return Pdf::loadView('pengajuan.pdf', [
            'pengajuan' => $pengajuan,
            'data' => $data,
        ])->stream('surat-' . $safeNomorSurat . '.pdf');
    }

    public function selesai(PengajuanSurat $pengajuan)
    {
        DB::transaction(function () use ($pengajuan) {

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