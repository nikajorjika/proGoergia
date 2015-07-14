<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $fillable = ['name'];
    public function trainings()
    {
        return $this->belongsToMany('App\Training')->withTimestamps();
    }
}
