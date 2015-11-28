<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekTraining extends Model
{
    protected $fillable = ['name', 'description', 'file', 'link','quantity','contact', 'per'];

    public function terms()
    {
        return $this->belongsToMany('App\Term')->withTimestamps();
    }
    public function fields()
    {
        return $this->belongsToMany('App\Field')->withTimestamps();
    }
    public function municipalities()
    {
        return $this->belongsToMany('App\Municipality')->withTimestamps();
    }
}
