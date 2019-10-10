<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partai extends Model
{
    protected $table = 'partai';
    public $timestamps = false;

    public function periode()
    {
        return $this->belongsTo('App\Models\Periode', 'id_periode');
    }
}
