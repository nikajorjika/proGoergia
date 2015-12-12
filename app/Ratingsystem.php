<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratingsystem extends Model
{
    protected $table = 'ratingsystems';

    public function declerations()
    {
        return $this->belongsToMany('App\Decleration')->withTimestamps();
    }
}
