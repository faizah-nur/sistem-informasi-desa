<?php

namespace App\Http\Controllers\User;
use App\Models\Kabar;
use App\Models\Warga;
use App\Models\Galeri;
use App\Models\visiMisi;
use App\Models\Pengumuman;
// use App\Models\TentangDesa;
use App\Models\PerangkatDesa;
use App\Models\DanaDesaRealisasi;
use Illuminate\Support\Facades\DB;
use App\Models\ProgressPembangunan;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // $tentang = TentangDesa::first();
        $visiMisi = visiMisi::first();

        $pengumuman = Pengumuman::published()
            ->orderBy('tanggal', 'desc')
            ->take(4)
            ->get();

        $progress = ProgressPembangunan::orderBy('tanggal_mulai', 'desc')
            ->take(3)
            ->get();

        $galeri = Galeri::active()
            ->latest()
            ->take(10)
            ->get();

        $popupKabars = Kabar::popup()
            ->where('is_active', true)
            ->orderBy('tanggal_publish', 'desc')
            ->take(1) // ubah ke 3 jika mau banyak
            ->get();

        $kabar = Kabar::latest()->take(10)->get();
        
        // ================== STATISTIK WARGA ==================
$totalWarga = Warga::distinct('nik')->count('nik');

$lansia = Warga::where('umur', '>', 50)->count();

$balita = Warga::where('umur', '<=', 5)->count();

$statusNikah = Warga::select(
        'status_pernikahan',
        DB::raw('COUNT(*) as total')
    )
    ->groupBy('status_pernikahan')
    ->get();

    $tahun = now()->year;

$totalDana = DanaDesaRealisasi::where('tahun', $tahun)->sum('anggaran');
$danaTerealisasi = DanaDesaRealisasi::where('tahun', $tahun)->sum('realisasi');

$persen = $totalDana > 0
    ? round(($danaTerealisasi / $totalDana) * 100)
    : 0;

$perangkat = PerangkatDesa::orderBy('nama')->take(4)->get();

return view('dashboard', compact(
    // 'tentang',
    'pengumuman',
    'visiMisi',
    'progress',
    'galeri',
    'popupKabars',
    'kabar',
    'totalWarga',
    'lansia',
    'balita',
    'statusNikah',
    'totalDana',
    'danaTerealisasi',
    'persen',
    'perangkat'
));

    }
}