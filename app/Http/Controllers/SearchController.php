<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Month;
use App\Municipality;
use App\Quarter;
use App\Region;
use App\Field;
use App\Term;
use App\Training;
use App\SeekTraining;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function keyword_search_seek()
    {

        $select =DB::select('SELECT seek_trainings.id, field_seek_training.field_id, municipality_seek_training.municipality_id
                                FROM seek_trainings
                                JOIN field_seek_training ON seek_trainings.id = field_seek_training.seek_training_id
                                JOIN municipality_seek_training ON seek_trainings.id = municipality_seek_training.seek_training_id
                                where seek_trainings.name like "%'.input::get('search_text').'%" OR seek_trainings.description like "%'.input::get('search_text').'%"
                                group by seek_trainings.id');
        $seek_training_filtered_array = [];
        foreach($select as $instance){
            $seek_training_filtered    = new \stdClass();
            $seek_training_instance    = SeekTraining::find($instance->id);
            $seek_training_field       = Field::find($instance->field_id);
            $seek_training_municipality= Municipality::find($instance->municipality_id);
            $seek_training_filtered->id          = $seek_training_instance->id;
            $seek_training_filtered->header      = $seek_training_instance->name;
            $seek_training_filtered->description = $seek_training_instance->description;
            $seek_training_filtered->file        = $seek_training_instance->file;
            $seek_training_filtered->link        = $seek_training_instance->link;
            $seek_training_filtered->contact     = $seek_training_instance->contact;
            $seek_training_filtered->quantity     = $seek_training_instance->quantity;
            $seek_training_filtered->field       = $seek_training_field->name;
            $seek_training_filtered->municipality= $seek_training_municipality->name;
            $seek_training_filtered->isAdmin     = Auth::check();
            $seek_training_filtered_array[] = $seek_training_filtered;
            unset($seek_training_filtered);
            unset($seek_training_months_array);
            unset($seek_training_terms_array);
        }
        return $seek_training_filtered_array;
    }

    public function keyword_search_trainings()
    {
        $select =DB::select(' SELECT trainings.id, field_training.field_id, term_training.term_id, municipality_training.municipality_id, month_training.month_id
                                FROM trainings
                                JOIN field_training ON trainings.id = field_training.training_id
                                JOIN term_training ON trainings.id = term_training.training_id
                                JOIN municipality_training ON trainings.id = municipality_training.training_id
                                JOIN month_training ON trainings.id = month_training.training_id
                                where trainings.name like "%'.input::get('search_text').'%" or trainings.description like "%'.input::get('search_text').'%"
                                group by trainings.id
                            ');
        foreach($select as $instance){
            $training_filtered    = new \stdClass();
            $training_instance    = Training::find($instance->id);
            $training_field       = Field::find($instance->field_id);
            $training_municipality= Municipality::find($instance->municipality_id);
            $training_months      = DB::select('SELECT months.name FROM month_training JOIN months ON months.id = month_training.month_id WHERE training_id = '.$instance->id);
            $training_terms       = DB::select('SELECT terms.name FROM term_training JOIN terms ON terms.id = term_training.term_id WHERE training_id = '.$instance->id);
            foreach($training_months as $month){
                $training_months_array[] = $month->name;
            }
            foreach($training_terms as $term){
                $training_terms_array[] = $term->name;
            }
            $training_filtered->id          = $training_instance->id;
            $training_filtered->header      = $training_instance->name;
            $training_filtered->description = $training_instance->description;
            $training_filtered->file        = $training_instance->file;
            $training_filtered->link        = $training_instance->link;
            $training_filtered->field       = $training_field->name;
            $training_filtered->months      = implode(',',$training_months_array);
            $training_filtered->terms       = implode(',',$training_terms_array);
            $training_filtered->municipality= $training_municipality->name;
            $training_filtered->isAdmin     = Auth::check();
            $training_filtered_array[] = $training_filtered;
            unset($training_filtered);
            unset($training_months_array);
            unset($training_terms_array);
        }


        return response(json_encode($training_filtered_array), 200)
            ->header('Content-Type', 'application/json'); ;

    }

    public function render_form_data()
    {
        $fields   = Field::orderBy('name')->lists('name', 'id');
        $terms    = Term::lists('name', 'id');
        $municipalities = Municipality::all();

        $municipality_regions = array();
        foreach ($municipalities as $m) {
            $municipality_regions[] = array(
                'municipality' => $m,
                'region'       => $m->region,
            );
        }

        $regions        = Region::lists('name', 'id');
        $type           = array(
            0 => 'ვატარებ',
            1 => 'ვეძებ'
        );

        $quarter  = Quarter::all()->lists('name','id');
        $month    = Month::all()->lists('name','id');

        return view('search_forms.search', [
            'fields'               => $fields,
            'terms'                => $terms,
            'regions'              => $regions,
            'municipality_regions' => $municipality_regions,
            'quarter'              => $quarter,
            'month'                => $month,
            'type'                 => $type
        ]);
    }

    public function get_announcements(Request $request)
    {
        $rules      = array(
            'month' => 'required'
        );

        $messages            = array(
            'month.required' => 'პერიოდი სავალდებულოა'
        );

        $this->validate($request, $rules, $messages);

        $field_search          = input::get('field');
        $term_search           = input::get('term');
        $region_search         = input::get('region');
        $municipalities_search = input::get('municipalities');
        $month_search          = input::get('month');


        if($field_search == '0' || empty($field_search)){
            $fields_all = Field::all(['id']);
            foreach($fields_all as $field){
                $fields[] = $field->id;
            }
        }else {
            $fields[] = $field_search;
        }

        if($term_search == '0' || empty($term_search)){
            $terms_all = Term::all(['id']);
            foreach($terms_all as $term){
                $terms[] = $term->id;
            }
        }else {
            $terms[] = $term_search;
        }

        if($municipalities_search[0] == '0' || empty($municipalities_search)){
            if($region_search != '0' && !empty($region_search)){
                $any_municipality = Region::find($region_search)->get_municipalities()->get();
            }else{
                $any_municipality = Municipality::all(['id']);
            }

            foreach ($any_municipality as $instance) {
                $municipality_id[] = $instance->id;
            }
        }else {
            $municipality_id = $municipalities_search;
        }
        if($month_search[0] != '0' || !empty($month_search[0])){
            $query_month =   'AND month_training.month_id in ('.implode(',', $month_search).')';
        }else {
            $query_month = '';
        }

        $select =DB::select(' SELECT trainings.id, field_training.field_id, term_training.term_id, municipality_training.municipality_id, month_training.month_id
                                FROM trainings
                                JOIN field_training ON trainings.id = field_training.training_id
                                JOIN term_training ON trainings.id = term_training.training_id
                                JOIN municipality_training ON trainings.id = municipality_training.training_id
                                JOIN month_training ON trainings.id = month_training.training_id
                                WHERE field_training.field_id in('.implode(',',$fields).')
                                AND term_training.term_id in ( '.implode(',',$terms).')
                                AND municipality_training.municipality_id in ('.implode(',',$municipality_id) .')
                                '.$query_month.'
                                group by trainings.id
                            ');
        foreach($select as $instance){
            $training_filtered    = new \stdClass();
            $training_instance    = Training::find($instance->id);
            $training_field       = Field::find($instance->field_id);
            $training_municipality= Municipality::find($instance->municipality_id);
            $training_months      = DB::select('SELECT months.name FROM month_training JOIN months ON months.id = month_training.month_id WHERE training_id = '.$instance->id);
            $training_terms       = DB::select('SELECT terms.name FROM term_training JOIN terms ON terms.id = term_training.term_id WHERE training_id = '.$instance->id);
            foreach($training_months as $month){
                $training_months_array[] = $month->name;
            }
            foreach($training_terms as $term){
                $training_terms_array[] = $term->name;
            }
            $training_filtered->id          = $training_instance->id;
            $training_filtered->header      = $training_instance->name;
            $training_filtered->description = $training_instance->description;
            $training_filtered->file        = $training_instance->file;
            $training_filtered->link        = $training_instance->link;
            $training_filtered->field       = $training_field->name;
            $training_filtered->months      = implode(',',$training_months_array);
            $training_filtered->terms       = implode(',',$training_terms_array);
            $training_filtered->municipality= $training_municipality->name;
            $training_filtered->isAdmin     = Auth::check();
            $training_filtered_array[] = $training_filtered;
            unset($training_filtered);
            unset($training_months_array);
            unset($training_terms_array);
        }


        return response(json_encode($training_filtered_array), 200)
            ->header('Content-Type', 'application/json');
    }

    public function download($file_name)
    {
        $file= public_path()."/../training_pdf/".$file_name.'.pdf';
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download($file, $file_name.'.pdf');
    }

    public function render_seek_form_data()
    {
        $fields   = Field::orderBy('name')->lists('name', 'id');
        $terms    = Term::lists('name', 'id');
        $municipalities = Municipality::all();

        $municipality_regions = array();
        foreach ($municipalities as $m) {
            $municipality_regions[] = array(
                'municipality' => $m,
                'region'       => $m->region,
            );
        }

        $regions        = Region::lists('name', 'id');
        return view('search_forms.seek', [
            'fields'               => $fields,
            'terms'                => $terms,
            'regions'              => $regions,
            'municipality_regions' => $municipality_regions,
        ]);
    }

    public function get_seek_announcements(Request $request)
    {
        $field_search          = input::get('field');
        $term_search           = input::get('term');
        $region_search         = input::get('region');
        $municipalities_search = input::get('municipalities');


        if($field_search == '0' || empty($field_search)){
            $fields_all = Field::all(['id']);
            foreach($fields_all as $field){
                $fields[] = $field->id;
            }
        }else {
            $fields[] = $field_search;
        }

        if($term_search == '0' || empty($term_search)){
            $terms_all = Term::all(['id']);
            foreach($terms_all as $term){
                $terms[] = $term->id;
            }
        }else {
            $terms[] = $term_search;
        }

        if($municipalities_search[0] == '0' || empty($municipalities_search)){
            if($region_search != '0' && !empty($region_search)){
                $any_municipality = Region::find($region_search)->get_municipalities()->get();
            }else{
                $any_municipality = Municipality::all(['id']);
            }

            foreach ($any_municipality as $instance) {
                $municipality_id[] = $instance->id;
            }
        }else {
            $municipality_id = $municipalities_search;
        }

        $select =DB::select(' SELECT seek_trainings.id, field_seek_training.field_id, municipality_seek_training.municipality_id
                                FROM seek_trainings
                                JOIN field_seek_training ON seek_trainings.id = field_seek_training.seek_training_id
                                JOIN municipality_seek_training ON seek_trainings.id = municipality_seek_training.seek_training_id
                                WHERE field_seek_training.field_id in('.implode(',',$fields).')
                                AND municipality_seek_training.municipality_id in ('.implode(',',$municipality_id) .')
                                group by seek_trainings.id
                            ');
        foreach($select as $instance){
            $seek_training_filtered    = new \stdClass();
            $seek_training_instance    = SeekTraining::find($instance->id);
            $seek_training_field       = Field::find($instance->field_id);
            $seek_training_municipality= Municipality::find($instance->municipality_id);
            $training_terms            = DB::select('SELECT terms.name FROM seek_training_term JOIN terms ON terms.id = seek_training_term.term_id WHERE seek_training_id = '.$instance->id);
            $seek_training_terms_array = [];
            foreach($training_terms as $term){
                $seek_training_terms_array[] = $term->name;
            }
            $seek_training_filtered->id          = $seek_training_instance->id;
            $seek_training_filtered->header      = $seek_training_instance->name;
            $seek_training_filtered->description = $seek_training_instance->description;
            $seek_training_filtered->file        = $seek_training_instance->file;
            $seek_training_filtered->link        = $seek_training_instance->link;
            $seek_training_filtered->per         = $seek_training_instance->per;
            $seek_training_filtered->terms       = implode(',',$seek_training_terms_array);
            $seek_training_filtered->contact     = $seek_training_instance->contact;
            $seek_training_filtered->quantity    = $seek_training_instance->quantity;
            $seek_training_filtered->field       = $seek_training_field->name;
            $seek_training_filtered->municipality= $seek_training_municipality->name;
            $seek_training_filtered->isAdmin     = Auth::check();
            $seek_training_filtered_array[]      = $seek_training_filtered;
            unset($seek_training_filtered);
            unset($seek_training_months_array);
            unset($seek_training_terms_array);
        }


        return response(json_encode($seek_training_filtered_array), 200)
            ->header('Content-Type', 'application/json'); ;

    }
}