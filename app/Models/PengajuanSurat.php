<?php
/**
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\PengajuanSuratFile[] $files
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\PengajuanSuratDetail[] $details
 * @property \App\Models\User $user
 * @property \App\Models\Warga $warga
 * @property \App\Models\JenisSurat $jenisSurat
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    protected $casts = [
    'tanggal_surat' => 'datetime',
];

    protected $fillable = [
        'user_id',
        'jenis_surat_id',
        'status',
        'nomor_surat',
        'tanggal_surat',
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
public function messages()
{
    return $this->hasMany(PengajuanMessage::class, 'pengajuan_surat_id')
                ->orderBy('created_at', 'asc');
}


}