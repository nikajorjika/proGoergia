<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Learnmaterial extends Model
{
    protected $table = 'learnmaterials';

    public function declerations()
    {
        return $this->belongsToMany('App\Decleration');
    }
}
