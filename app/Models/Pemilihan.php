<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemilihan extends Model
{
    protected $table = 'pemilihan';
    public $timestamps = false;

    public function periode()
    {
        return $this->belongsTo('App\Models\Periode', 'id_periode');
    }
}
