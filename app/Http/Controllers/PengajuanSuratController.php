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
            'keperluan' => 'Keperluan',
        ],
        'domisili' => [
            'tujuan' => 'Tujuan Pembuatan Surat',
        ],
        'sktm' => [
            'pekerjaan' => 'Pekerjaan',
        ],
        'sku' => [
            'nama_usaha'   => 'Nama Usaha',
            'jenis_usaha'  => 'Jenis Usaha',
            'alamat_usaha' => 'Alamat Usaha',
            'lama_usaha'   => 'Lama Usaha',
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
 * ✅ DOWNLOAD PDF (USER)
 * - hanya pemilik pengajuan
 * - hanya status selesai
 */
public function downloadPdf($id)
{
    $pengajuan = PengajuanSurat::with(['jenisSurat','details','warga'])
        ->where('id', $id)
        ->where('user_id', auth()->id())
        ->where('status', 'selesai')
        ->firstOrFail();

    if (!$pengajuan->nomor_surat) {
        abort(404, 'Nomor surat belum tersedia');
    }

    $data = SuratDataMapper::map($pengajuan);

    // amankan nama file
    $safeNomor = str_replace(['/', '\\'], '-', $pengajuan->nomor_surat);

    return Pdf::loadView('pengajuan.pdf', [
        'pengajuan' => $pengajuan,
        'data'      => $data
    ])->download("surat-{$safeNomor}.pdf");
}



}