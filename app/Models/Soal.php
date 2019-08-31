<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal';
    public $timestamps = false;

    public function narasi()
    {
        return $this->belongsTo('App\Models\Narasi', 'id_cerita');
    }

}
