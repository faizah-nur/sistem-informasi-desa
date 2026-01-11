<?php

namespace App\Http\Controllers\User;
use App\Models\Warga;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Kabar;
use App\Models\Galeri;
use App\Models\Pengumuman;
use App\Models\TentangDesa;
use App\Models\ProgressPembangunan;

class DashboardController extends Controller
{
    public function index()
    {
        $tentang = TentangDesa::first();

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


return view('dashboard', compact(
    'tentang',
    'pengumuman',
    'progress',
    'galeri',
    'popupKabars',
    'kabar',
    'totalWarga',
    'lansia',
    'balita',
    'statusNikah'
));

    }
}