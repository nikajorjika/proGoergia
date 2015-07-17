<?php

namespace App\Http\Controllers;

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

    public function get_announcements()
    {
        $field_search = input::get('field');
        $term_search = input::get('term');
        $region_search = input::get('region');
        $municipalities_search = input::get('municipalities');
        $month_search = input::get('month');
        $trainings = Training::all();
        $any_municipality = Region::find($region_search)->get_municipalities()->get();



        if($municipalities_search[0] == '0' || empty($municipalities_search)){
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

        $select = DB::select('
        SELECT *
        FROM trainings
        JOIN field_training ON trainings.id = field_training.training_id
        JOIN term_training ON trainings.id = term_training.training_id
        JOIN municipality_training ON trainings.id = municipality_training.training_id
        JOIN month_training ON trainings.id = month_training.training_id
        WHERE field_training.field_id = '.$field_search.'
        AND term_training.term_id = '.$term_search.'
        AND municipality_training.municipality_id in ('.implode(',',$municipality_id) .')
        '.$query_month.'
        ');

        return $select;
    }
}
