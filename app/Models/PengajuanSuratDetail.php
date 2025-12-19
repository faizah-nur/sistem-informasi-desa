<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanSuratDetail extends Model
{
    protected $fillable = [
        'pengajuan_surat_id',
        'key',
        'value'
    ];

    public function pengajuanSurat()
    {
        return $this->belongsTo(PengajuanSurat::class);
    }
}