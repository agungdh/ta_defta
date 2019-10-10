<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalonDPD extends Model
{
    protected $table = 'calon_dpd';
    public $timestamps = false;

    public function partai()
    {
        return $this->belongsTo('App\Models\Partai', 'id_partai');
    }

    public function periode()
    {
        return $this->belongsTo('App\Models\Periode', 'id_periode');
    }
}
