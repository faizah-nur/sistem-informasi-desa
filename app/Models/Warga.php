<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'umur',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'agama',
        'pekerjaan',
        'no_hp',
        'status_pernikahan',
        'kewarganegaraan',
        'aktif'
    ];
}