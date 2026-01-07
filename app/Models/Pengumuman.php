<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengumuman extends Model
{
    use HasFactory;
    protected $table = 'pengumuman';

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'is_published',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'is_published' => 'boolean',
    ];

    // scope untuk yang tampil saja
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}