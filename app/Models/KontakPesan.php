<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakPesan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'pesan',
    ];
    protected $casts = [
    'is_read' => 'boolean',
];

}