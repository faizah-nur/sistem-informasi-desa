<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PengajuanSurat;
use App\Models\JenisSurat;
use App\Models\PengajuanSuratDetail;
use App\Models\PengajuanSuratFile;
use Illuminate\Support\Facades\DB;

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
public function riwayat()
{
    $pengajuans = PengajuanSurat::with('jenisSurat')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('pengajuan.riwayat', compact('pengajuans'));
}
public function show($id)
{
    $pengajuan = PengajuanSurat::with(['jenisSurat', 'details', 'files'])
        ->where('id', $id)
        ->where('user_id', auth()->id()) // keamanan
        ->firstOrFail();

    return view('pengajuan.show', compact('pengajuan'));
}
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


}