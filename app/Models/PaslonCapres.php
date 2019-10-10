<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaslonCapres extends Model
{
    protected $table = 'paslon_capres';
    public $timestamps = false;

    public function periode()
    {
        return $this->belongsTo('App\Models\Periode', 'id_periode');
    }
}
