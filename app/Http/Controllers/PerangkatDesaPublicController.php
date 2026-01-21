<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;

class PerangkatDesaPublicController extends Controller
{
    // Menampilkan beberapa perangkat di dashboard
    public function dashboardPreview($limit = 4)
    {
        $perangkat = PerangkatDesa::orderBy('nama')->take($limit)->get();
        return view('dashboard', compact('perangkat'));
    }

    // Menampilkan semua perangkat lengkap
    public function index()
    {
        $perangkat = PerangkatDesa::orderBy('nama')->get();
        return view('perangkat_desa.index', compact('perangkat'));
    }

}