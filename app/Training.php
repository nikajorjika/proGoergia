<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Field;
use App\Term;
use App\Municipality;
class Training extends Model
{
    protected $fillable = ['name', 'description', 'file', 'link'];

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

    public function quarters()
    {
        return $this->belongsToMany('App\Quarter')->withTimestamps();
    }

    public function months()
    {
        return $this->belongsToMany('App\Month')->withTimestamps();
    }
}
