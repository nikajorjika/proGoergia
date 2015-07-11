<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LocationMunicipality;

class LocationRegion extends Model
{
    protected $fillable = array('name');

    public function get_municipalities()
    {
        return $this->hasMany('App\LocationMunicipality','region_id');
    }
}
