<?php

namespace App\Http\Controllers;

use App\LocationMunicipality;
use App\LocationRegion;
use App\StudyField;
use App\StudyTerm;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;

class AddController extends Controller
{
    public function add_study_field()
    {
        return view('add_forms.add_form',[
            'action' => 'AddController@store_study_field',
            'header' => 'სწავლების სფეროს დამატება'
        ]);
    }

    public function store_study_field()
    {
        StudyField::create(Input::all());

        return redirect('/add_study_field');
    }

    public function add_study_term()
    {
        return view('add_forms.add_form', [
            'action' => 'AddController@store_study_term',
            'header' => 'სწავლების ფორმის დამატება'
        ]);
    }
    public function store_study_term()
    {
        StudyTerm::create(Input::all());

        return redirect('/add_study_term');
    }

    public function add_location_municipality()
    {
        $regions = LocationRegion::all()->lists('name', 'id');

        return view('add_forms.add_form',[
            'action'  => 'AddController@store_location_municipality',
            'header'  => 'ჩატარების ადგილის დამატება (მუნიციპალიტეტი)',
            'regions' => $regions
        ]);
    }

    public function store_location_municipality()
    {
        LocationMunicipality::create(Input::all());

        return redirect('/add_location_municipality');
    }

    public function add_location_region()
    {
        return view('add_forms.add_form', [
            'action' => 'AddController@store_location_region',
            'header' => 'ჩატარების ადგილის დამატება (რეგიონული ცენტრი)'
        ]);
    }

    public function store_location_region()
    {
        LocationRegion::create(Input::all());

        return redirect('/add_location_region');
    }

    public function add_announcement()
    {
        $study_fields   = StudyField::lists('name', 'id');
        $study_terms    = StudyTerm::lists('name', 'id');
        $municipalities = LocationMunicipality::all();

        $municipality_regions = array();
        foreach ($municipalities as $m) {
            $municipality_regions[] = array(
                'municipality' => $m,
                'region'       => $m->region,
            );
        }

        $regions        = LocationRegion::lists('name', 'id');
        $type           = array(
            0 => 'ვატარებ',
            1 => 'ვეძებ'
        );

        $quarter  = Config::get('localvariables.quarter');
        $month    = Config::get('localvariables.month');

        return view('add_forms.add_announcement', [
            'study_fields'         => $study_fields,
            'study_terms'          => $study_terms,
            'regions'              => $regions,
            'municipality_regions' => $municipality_regions,
            'quarter'              => $quarter,
            'month'                => $month,
            'type'                 => $type
        ]);
    }

    public function store_announcement()
    {
        return(input::all());
    }
}
