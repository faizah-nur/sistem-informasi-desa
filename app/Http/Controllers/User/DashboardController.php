<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TentangDesa;
use App\Models\Pengumuman;
use App\Models\ProgressPembangunan;
use App\Models\Galeri;

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

        return view('dashboard', compact(
            'tentang',
            'pengumuman',
            'progress',
            'galeri'
        ));
    }
}