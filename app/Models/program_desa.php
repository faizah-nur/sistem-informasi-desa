<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class program_desa extends Model
{
    protected $fillable = [
        'tahun_anggaran_id',
        'nama_program',
        'deskripsi'
    ];

    public function tahunAnggaran()
    {
        return $this->belongsTo(tahun_anggaran::class);
    }

    public function realisasiDanas()
    {
        return $this->hasMany(realisasi_dana::class);
    }
}