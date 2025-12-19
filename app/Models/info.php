<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'ringkasan',
        'isi',
        'label',
        'tanggal_posting',
        'is_active',
    ];

    protected $casts = [
        'tanggal_posting' => 'date',
        'is_active' => 'boolean',
    ];
}