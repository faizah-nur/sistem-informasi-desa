<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DanaDesaRealisasi;

class DanaDesaController extends Controller
{
    public function index()
    {
        $tahun = now()->year;

        $realisasi = DanaDesaRealisasi::where('tahun', $tahun)
            ->orderBy('tanggal', 'desc')
            ->get();

        $totalAnggaran = $realisasi->sum('anggaran');
        $totalRealisasi = $realisasi->sum('realisasi');

        return view('dana-desa.realisasi', compact(
            'realisasi',
            'tahun',
            'totalAnggaran',
            'totalRealisasi'
        ));
    }
}