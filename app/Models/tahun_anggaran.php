<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tahun_anggaran extends Model
{
    protected $fillable = ['tahun', 'total_dana'];

    public function programDesas()
    {
        return $this->hasMany(program_desa::class);
    }

    public function realisasi()
    {
        return $this->hasManyThrough(
            realisasi_dana::class,
            program_desa::class
        );
    }
}