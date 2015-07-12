<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Region;
use App\Training;
class Municipality extends Model
{
    protected $fillable = array('name', 'region_id');

    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    public function trainings()
    {
        return $this->belongsToMany('App\Training')->withTimestamps();
    }

    public function get_by_id()
    {
        return $this->belongsTo('App\Region');
    }
}
