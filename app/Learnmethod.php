<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Learnmethod extends Model
{
    protected $table = 'learnmethods';

    public function declerations()
    {
        return $this->belongsToMany('App\Decleration');
    }
}
