<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    protected $fillable = [
        'user_id',
        'jenis_surat_id',
        'status',
        'catatan_admin'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class);
    }

    public function details()
    {
        return $this->hasMany(PengajuanSuratDetail::class);
    }

    public function files()
    {
        return $this->hasMany(PengajuanSuratFile::class);
    }
}