<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listenernumber extends Model
{
    protected $table =  'listenernumbers';

    public function declerations()
    {
        return $this->belongsToMany('App\Decleration')->withTimestamps();
    }
}
