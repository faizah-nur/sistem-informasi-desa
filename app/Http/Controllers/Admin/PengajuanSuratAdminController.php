<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PengajuanSuratAdminController extends Controller
{
    public function index()
    {
        $pengajuans = PengajuanSurat::with('user','jenisSurat')
            ->latest()
            ->paginate(10);

        return view('admin.layanan.index', compact('pengajuans'));
    }

    public function show(PengajuanSurat $pengajuan)
    {
        $pengajuan->load('user','jenisSurat','details');

        return view('admin.layanan.show', compact('pengajuan'));
    }
public function update(Request $request, PengajuanSurat $pengajuan)
{
    $request->validate([
        'status' => 'required|in:diproses,ditolak,selesai',
        'catatan_admin' => 'nullable|string'
    ]);

    $data = [
        'status' => $request->status,
        'catatan_admin' => $request->catatan_admin
    ];

    // 🔥 JIKA ADMIN MENYELESAIKAN SURAT
    if ($request->status === 'selesai' && $pengajuan->nomor_surat === null) {
        $data['nomor_surat'] = $this->generateNomorSurat(
            $pengajuan->jenisSurat->slug
        );
    }

    $pengajuan->update($data);

    return back()->with('success', 'Status pengajuan berhasil diperbarui');
}



    
    public function exportPdf(PengajuanSurat $pengajuan)
{
    $pdf = Pdf::loadView('admin.layanan.pdf', [
        'pengajuan' => $pengajuan
    ])->setPaper('A4', 'portrait');

    return $pdf->download(
        'Surat-' . $pengajuan->jenisSurat->slug . '.pdf'
    );
}
private function generateNomorSurat($slug)
{
    $tahun = now()->year;

    $last = PengajuanSurat::whereYear('created_at', $tahun)
        ->whereHas('jenisSurat', fn ($q) => $q->where('slug', $slug))
        ->whereNotNull('nomor_surat')
        ->count() + 1;

    return sprintf(
        '%03d/%s/DESA/%d',
        $last,
        strtoupper($slug),
        $tahun
    );
}


public function downloadPdf(PengajuanSurat $pengajuan)
{
    // 1. Pastikan milik user
    if ($pengajuan->user_id !== auth()->id()) {
        abort(403);
    }

    // 2. Pastikan SUDAH SELESAI
    if ($pengajuan->status !== 'selesai') {
        abort(403, 'Surat belum selesai diproses');
    }

    // 3. Generate PDF
    $pdf = Pdf::loadView('pengajuan.pdf', [
        'pengajuan' => $pengajuan
    ]);

    return $pdf->download(
        'Surat-' . $pengajuan->id . '.pdf'
    );
}

}