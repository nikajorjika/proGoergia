<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Training;
class Field extends Model
{
    protected $fillable = array('name');
    public function trainings()
    {
        return $this->belongsToMany('App\Training')->withTimestamps();
    }
}
