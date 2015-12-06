<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decleration extends Model
{
    //
    protected $table = 'declerations';


    protected $fillable =
        ['applicant','law_form','identification_number','address','contact_person','email'
        ,'contact_telephone','comment','field_id','edu_program_name','edu_program_goal','edu_program_prelet',
        'edu_program_goal_groups','edu_program_listeners_number','edu_programm_cube','edu_program_results',
        'program_short_desc','edu_program_learn_methods','edu_program_participants_ratings','certificate_award_rules',
        'edu_program_rating_system','edu_program_human_resource','trainers_contracts','edu_program_learn_env',
        'edu_program_learn_resources','edu_program_learn_materials', 'user_id'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App/User');
    }
    public function field()
    {
        return $this->belongsTo('App\Field');
    }
}