<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LocationRegion;
use App\Training;
class LocationMunicipality extends Model
{
    protected $fillable = array('name', 'region_id');

    public function region()
    {
        return $this->belongsTo('App\LocationRegion');
    }

    public function trainings()
    {
        return $this->belongsToMany('App\Training')->withTimestamps();
    }

    public function get_by_id()
    {
        return $this->belongsTo('App\LocationRegion');
    }
}
