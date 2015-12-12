<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimation extends Model
{
    protected $table = 'estimations';

    public function declerations()
    {
        return $this->hasMany('App\Decleration');
    }
}
