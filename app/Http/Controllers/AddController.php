<?php

namespace App\Http\Controllers;

use App\Month;
use App\Municipality;
use App\Quarter;
use App\Region;
use App\Field;
use App\Term;
use App\Training;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;

class AddController extends Controller
{
    public function add_field()
    {
        return view('add_forms.add_form',[
            'action' => 'AddController@store_field',
            'header' => 'სწავლების სფეროს დამატება'
        ]);
    }

    public function store_field()
    {
        Field::create(Input::all());

        return redirect('/add_field');
    }

    public function add_term()
    {
        return view('add_forms.add_form', [
            'action' => 'AddController@store_term',
            'header' => 'სწავლების ფორმის დამატება'
        ]);
    }
    public function store_term()
    {
        Term::create(Input::all());

        return redirect('/add_term');
    }

    public function add_municipality()
    {
        $regions = Region::all()->lists('name', 'id');

        return view('add_forms.add_form',[
            'action'  => 'AddController@store_municipality',
            'header'  => 'ჩატარების ადგილის დამატება (მუნიციპალიტეტი)',
            'regions' => $regions
        ]);
    }

    public function store_municipality()
    {
        Municipality::create(Input::all());

        return redirect('/add_municipality');
    }

    public function add_region()
    {
        return view('add_forms.add_form', [
            'action' => 'AddController@store_region',
            'header' => 'ჩატარების ადგილის დამატება (რეგიონული ცენტრი)'
        ]);
    }

    public function store_region()
    {
        Region::create(Input::all());

        return redirect('/add_region');
    }

    public function add_announcement()
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

        return view('add_forms.add_announcement', [
            'fields'               => $fields,
            'terms'                => $terms,
            'regions'              => $regions,
            'municipality_regions'              => $municipality_regions,
            'quarter'              => $quarter,
            'month'                => $month,
            'type'                 => $type
        ]);
    }

    public function store_announcement()
    {
        $training = Training::create(input::all());
        foreach (input::get('term') as $term) {
            $training->terms()->attach($term);
            }
        $training->fields()->attach(input::get('field'));
        $training->municipalities()->attach(input::get('municipalities'));
        if(!is_null(input::get('quarter'))) {
            foreach (input::get('quarter') as $quarter) {
                $training->quarters()->attach($quarter);
            }
        }
        if(!is_null(input::get('month'))){
            foreach (input::get('month') as $month) {

                $training->months()->attach($month);
            }
        }
        $training->save();
        return 'Object saved';
    }
}
