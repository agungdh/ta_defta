<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mid extends Model
{
    protected $table = 'mid';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

}
