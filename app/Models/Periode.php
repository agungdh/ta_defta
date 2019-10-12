<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periode';
    public $timestamps = false;

    public function calonDpds()
    {
        return $this->hasMany('App\Models\CalonDPD', 'id_periode');
    }

    public function paslonCapress()
    {
        return $this->hasMany('App\Models\PaslonCapres', 'id_periode');
    }

    public function partais()
    {
        return $this->hasMany('App\Models\Partai', 'id_periode');
    }

}
