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
        'is_popup',
    ];
    public function komentars()
{
    return $this->hasMany(Komentar::class)->latest();
}
public function scopePopup($query)
{
    return $query->where('is_popup', true)
                 ->where('is_active', true);
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