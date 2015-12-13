<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Training;
class Term extends Model
{
    protected $fillable = array('name');
    public function trainings()
    {
        return $this->belongsToMany('App\Training')->withTimestamps();
    }
    public function declerations()
    {
        return $this->belongsToMany('App\Decleration')->withTimestamps();
    }
}
