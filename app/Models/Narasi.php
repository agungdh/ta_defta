<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Narasi extends Model
{
    protected $table = 'cerita';
    public $timestamps = false;

    public function materi()
    {
        return $this->belongsTo('App\Models\Materi', 'id_materi');
    }

    public function soals()
    {
        return $this->hasMany('App\Models\Soal', 'id_cerita');
    }
}
