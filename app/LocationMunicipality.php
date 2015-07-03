<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationMunicipality extends Model
{
    protected $fillable = array('name', 'region_id');
}
