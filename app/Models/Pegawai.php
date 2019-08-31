<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    public $timestamps = false;

    public function bidangSektor()
    {
        return $this->belongsTo('App\Models\BidangSektor', 'id_bidang_sektor');
    }
}
