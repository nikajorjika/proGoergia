<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        return 'something';
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

    }

    public function add_location_municipality()
    {
        return view('add_forms.add_form',[
            'action' => 'AddController@store_location_municipality',
            'header' => 'ჩატარების ადგილის დამატება (მუნიციპალიტეტი)'
        ]);
    }

    public function store_location_municipality()
    {

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

    }
}
