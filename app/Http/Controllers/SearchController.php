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

class SearchController extends Controller
{
    public function index()
    {
        $fields   = Field::lists('name', 'id');
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

        $select =DB::select(' SELECT trainings.id
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
            $selected_ids[] = $instance->id;
        }
        $trainings_filtered = Training::all()->filter(function($training) use ($selected_ids){
            return  in_array($training->id, $selected_ids);
        });
        return $trainings_filtered;
    }

    public function download($file_name)
    {
        $file= public_path(). "/training_pdf/".$file_name.'.pdf';
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download($file, $file_name.'.pdf');
    }
}
