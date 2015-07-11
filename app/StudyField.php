<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Training;
class StudyField extends Model
{
    protected $fillable = array('name');
    public function trainings()
    {
        return $this->belongsToMany('App\Training')->withTimestamps();
    }
}
