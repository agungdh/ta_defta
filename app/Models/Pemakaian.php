<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemakaian extends Model
{
    protected $table = 'pemakaian';
    public $timestamps = false;

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai', 'id_pegawai');
    }
}
