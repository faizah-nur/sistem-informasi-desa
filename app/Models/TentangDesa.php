<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangDesa extends Model
{
    use HasFactory;

    protected $table = 'tentang_desa';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
    ];
}