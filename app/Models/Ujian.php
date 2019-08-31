<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    protected $table = 'ujian';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function materi()
    {
        return $this->belongsTo('App\Models\Materi', 'id_materi');
    }
}
