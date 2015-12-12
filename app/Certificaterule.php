<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificaterule extends Model
{
    protected $table = 'certificaterules';

    public function declerations()
    {
        return $this->hasMany('App\Decleration');
    }
}
