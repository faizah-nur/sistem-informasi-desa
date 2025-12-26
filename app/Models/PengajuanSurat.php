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
        // relasi ke user (pengaju)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relasi ke warga via user.nik
public function warga()
{
    return $this->hasOneThrough(
        Warga::class,
        User::class,
        'id',        // foreign key di users (users.id)
        'nik',       // foreign key di wargas (wargas.nik)
        'user_id',   // local key di pengajuan_surats
        'nik'        // local key di users
    );
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