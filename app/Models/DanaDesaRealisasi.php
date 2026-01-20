<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanaDesaRealisasi extends Model
{
    protected $table = 'dana_desa_realisasis';

    protected $fillable = [
        'tahun',
        'nama_kegiatan',
        'anggaran',
        'realisasi',
        'tanggal',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'tahun' => 'integer',
    ];
}