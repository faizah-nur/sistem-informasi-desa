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
            'status' => 'required|in:pending,diproses,ditolak,selesai',
            'catatan_admin' => 'nullable|string'
        ]);

        $pengajuan->update([
            'status' => $request->status,
            'catatan_admin' => $request->catatan_admin
        ]);

        return redirect()
            ->route('admin.layanan.show', $pengajuan->id)
            ->with('success', 'Status pengajuan berhasil diperbarui');
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
}