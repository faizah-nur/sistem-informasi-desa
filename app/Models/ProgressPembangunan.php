<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressPembangunan extends Model
{
    use HasFactory;

    protected $table = 'progress_pembangunan';

    protected $fillable = [
        'judul_kegiatan',
        'deskripsi',
        'persentase_progress',
        'status',
        'ikon',
        'tanggal_mulai',
        'tanggal_selesai',
    ];
}