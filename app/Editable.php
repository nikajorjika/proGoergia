<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editable extends Model
{
    protected $table = 'editables';

    protected $fillable = ['decleration_id', 'field_name'];

    public function declerations()
    {
        return $this->belongsTo('App\Decleration');
    }

    public static function checkIfEditable($decleration_id, $field_name)
    {
    	return Editable::where('decleration_id', $decleration_id)
    				   ->where('field_name', $field_name)
    				   ->exists();
    }

    public static function deleteEditable($decleration_id, $field_name)
    {
    	return Editable::where('decleration_id', $decleration_id)
    				   ->where('field_name', $field_name)
    				   ->delete();
    }
}
