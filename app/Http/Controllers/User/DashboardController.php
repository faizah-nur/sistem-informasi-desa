<?php

namespace App\Http\Controllers\User;

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

        // 🔥 KABAR POPUP (HANYA YANG AKTIF)
        $popupKabars = Kabar::popup()
            ->where('is_active', true)
            ->orderBy('tanggal_publish', 'desc')
            ->take(1) // ubah ke 3 jika mau banyak
            ->get();

        return view('dashboard', compact(
            'tentang',
            'pengumuman',
            'progress',
            'galeri',
            'popupKabars'
        ));
    }
}