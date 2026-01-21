<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class visiMisi extends Model
{
    protected $table = 'visi_misis';

    protected $fillable = [
        'visi',
        'misi',
        'gambar',
    ];
}