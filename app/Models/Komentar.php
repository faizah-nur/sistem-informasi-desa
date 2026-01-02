<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $fillable = ['kabar_id', 'user_id', 'isi'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kabar()
    {
        return $this->belongsTo(Kabar::class);
    }
}