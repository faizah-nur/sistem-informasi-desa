<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanSuratFile extends Model
{
    protected $fillable = [
        'pengajuan_surat_id',
        'nama_file',
        'path'
    ];

    public function pengajuanSurat()
    {
        return $this->belongsTo(PengajuanSurat::class);
    }
}