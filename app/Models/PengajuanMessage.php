<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengajuan_surat_id',
        'user_id',
        'pesan',
        'sender_role',
    ];

    /**
     * Pesan milik pengajuan surat
     */
    public function pengajuan()
    {
        return $this->belongsTo(PengajuanSurat::class, 'pengajuan_surat_id');
    }

    /**
     * Pengirim pesan (admin / warga)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}