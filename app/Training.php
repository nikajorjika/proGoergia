<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\StudyField;
use App\StudyTerm;
use App\LocationMunicipality;
class Training extends Model
{
    public function terms()
    {
        return $this->belongsToMany('App\StudyTerm')->withTimestamps();
    }
    public function fields()
    {
        return $this->belongsToMany('App\StudyField')->withTimestamps();
    }
    public function municipalities()
    {
        return $this->belongsToMany('App\LocationMunicipality')->withTimestamps();
    }
}
