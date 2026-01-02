<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabar extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'gambar',
        'isi',
        'kategori',
        'tanggal_publish',
        'is_active',
    ];
    public function komentars()
{
    return $this->hasMany(Komentar::class)->latest();
}

    protected $casts = [
        'tanggal_publish' => 'date',
        'is_active' => 'boolean',
    ];
    public function scopeActive($query)
{
    return $query->where('is_active', true);
}

}