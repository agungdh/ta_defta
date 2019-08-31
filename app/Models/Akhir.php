<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akhir extends Model
{
    protected $table = 'akhir';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

}
