<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{
    protected $fillable = ['name'];
    public function trainings()
    {
        return $this->belongsToMany('App\Training')->withTimestamps();
    }
}
