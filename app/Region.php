<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Municipality;

class Region extends Model
{
    protected $fillable = array('name');

    public function get_municipalities()
    {
        return $this->hasMany('App\Municipality','region_id');
    }
}
