<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class realisasi_dana extends Model
{
    protected $fillable = [
        'program_desa_id',
        'tanggal',
        'jumlah',
        'keterangan'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function programDesa()
    {
        return $this->belongsTo(program_desa::class);
    }
}