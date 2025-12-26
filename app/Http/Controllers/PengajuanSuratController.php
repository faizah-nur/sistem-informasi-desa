<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanSurat;
use App\Models\JenisSurat;
use App\Models\PengajuanSuratDetail;
use App\Models\PengajuanSuratFile;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\SuratDataMapper;


class PengajuanSuratController extends Controller
{
    public function create($slug)
    {
        $jenisSurat = JenisSurat::where('slug', $slug)
            ->where('aktif', true)
            ->firstOrFail();

        $fields = match ($slug) {
            'skck' => [
                'nama_lengkap' => 'Nama Lengkap',
                'nik' => 'NIK',
                'alamat' => 'Alamat',
            ],
            'domisili' => [
                'nama_lengkap' => 'Nama Lengkap',
                'alamat' => 'Alamat',
                'keperluan' => 'Keperluan',
            ],
            'sktm' => [
                'nama_lengkap' => 'Nama Lengkap',
                'nik' => 'NIK',
                'pekerjaan' => 'Pekerjaan',
            ],
            'sku' => [
                'nama_usaha' => 'Nama Usaha',
                'alamat_usaha' => 'Alamat Usaha',
            ],
            default => [],
        };

        return view('pengajuan.create', compact('jenisSurat', 'fields'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat_id' => 'required|exists:jenis_surats,id',
            'data' => 'required|array',
            'files.*' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        DB::transaction(function () use ($request) {

            $pengajuan = PengajuanSurat::create([
                'user_id' => auth()->id(),
                'jenis_surat_id' => $request->jenis_surat_id,
                'status' => 'pending',
            ]);

            foreach ($request->data as $key => $value) {
                PengajuanSuratDetail::create([
                    'pengajuan_surat_id' => $pengajuan->id,
                    'key' => $key,
                    'value' => $value,
                ]);
            }

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('pengajuan_files', 'public');

                    PengajuanSuratFile::create([
                        'pengajuan_surat_id' => $pengajuan->id,
                        'nama_file' => $file->getClientOriginalName(),
                        'path' => $path,
                    ]);
                }
            }
        });

        return redirect()
            ->route('pengajuan.riwayat')
            ->with('success', 'Pengajuan berhasil dikirim');
    }

    /**
     * ✅ RIWAYAT (DIPERBAIKI: PAGINATION)
     */
    public function riwayat()
    {
        $pengajuans = PengajuanSurat::with('jenisSurat')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10); // ⬅️ WAJIB

        return view('pengajuan.riwayat', compact('pengajuans'));
    }

    public function show($id)
    {
        $pengajuan = PengajuanSurat::with(['jenisSurat', 'details', 'files'])
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('pengajuan.show', compact('pengajuan'));
    }

    /**
     * ❗ CATATAN:
     * status "dibatalkan" HARUS ADA di enum migration
     */
    public function batalkan($id)
    {
        $pengajuan = PengajuanSurat::where('id', $id)
            ->where('user_id', auth()->id())
            ->where('status', 'pending')
            ->firstOrFail();

        $pengajuan->update([
            'status' => 'dibatalkan'
        ]);

        return redirect()
            ->route('pengajuan.riwayat')
            ->with('success', 'Pengajuan berhasil dibatalkan.');
    }

    /**
     * ✅ EXPORT PDF (USER ONLY, STATUS SELESAI)
     */
    public function pdf($id)
    {
        $pengajuan = PengajuanSurat::with(['jenisSurat', 'details'])
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->where('status', 'selesai')
            ->firstOrFail();

        $pdf = Pdf::loadView('pengajuan.pdf', compact('pengajuan'));

        return $pdf->download(
            'surat-' . $pengajuan->jenisSurat->slug . '.pdf'
        );
    }


public function downloadPdf($id)
{
    $pengajuan = PengajuanSurat::with(['warga','jenisSurat'])
                    ->findOrFail($id);

    $data = SuratDataMapper::map($pengajuan);

    return Pdf::loadView('pengajuan.pdf', [
        'pengajuan' => $pengajuan,
        'data'      => $data,
    ])->download('surat-'.$pengajuan->jenisSurat->slug.'.pdf');
}

private function generateNomorSurat($jenis)
{
    $bulanRomawi = [
        1=>'I',2=>'II',3=>'III',4=>'IV',5=>'V',6=>'VI',
        7=>'VII',8=>'VIII',9=>'IX',10=>'X',11=>'XI',12=>'XII'
    ];

    $tahun = now()->year;
    $bulan = $bulanRomawi[now()->month];

    $count = PengajuanSurat::whereYear('created_at', $tahun)
        ->whereHas('jenisSurat', fn($q) => $q->where('slug', $jenis))
        ->count() + 1;

    return "470/$count/" . strtoupper($jenis) . "/$bulan/$tahun";
}


}