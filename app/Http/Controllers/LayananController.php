<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JenisSurat;

class LayananController extends Controller
{
    public function index()
    {
        $jenisSurats = JenisSurat::where('aktif', true)->get();

        return view('layanan.index', compact('jenisSurats'));
    }
}