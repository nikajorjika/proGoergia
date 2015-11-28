<?php

namespace App\Http\Controllers;

use App\Month;
use App\Municipality;
use App\Quarter;
use App\Region;
use App\Field;
use App\Term;
use App\Training;
use App\SeekTraining;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class AddController extends Controller
{
    public function add_field()
    {
        if (!Auth::user())
            return redirect('/');

        return view('add_forms.add_form',[
            'action' => 'AddController@store_field',
            'header' => 'სწავლების სფეროს დამატება'
        ]);
    }

    public function store_field()
    {
        if (!Auth::user())
            return redirect('/');

        Field::create(Input::all());

        return redirect('/add_field');
    }

    public function add_term()
    {
        if (!Auth::user())
            return redirect('/');

        return view('add_forms.add_form', [
            'action' => 'AddController@store_term',
            'header' => 'სწავლების ფორმის დამატება'
        ]);
    }
    public function store_term()
    {
        if (!Auth::user())
            return redirect('/');

        Term::create(Input::all());

        return redirect('/add_term');
    }

    public function add_municipality()
    {
        if (!Auth::user())
            return redirect('/');

        $regions = Region::all()->lists('name', 'id');

        return view('add_forms.add_form',[
            'action'  => 'AddController@store_municipality',
            'header'  => 'ჩატარების ადგილის დამატება (მუნიციპალიტეტი)',
            'regions' => $regions
        ]);
    }

    public function store_municipality()
    {
        if (!Auth::user())
            return redirect('/');

        Municipality::create(Input::all());

        return redirect('/add_municipality');
    }

    public function add_region()
    {
        if (!Auth::user())
            return redirect('/');

        return view('add_forms.add_form', [
            'action' => 'AddController@store_region',
            'header' => 'ჩატარების ადგილის დამატება (რეგიონული ცენტრი)'
        ]);
    }

    public function store_region()
    {
        if (!Auth::user())
            return redirect('/');

        Region::create(Input::all());

        return redirect('/add_region');
    }

    public function add_announcement()
    {
        if (!Auth::user() || Auth::user()->role != 1)
            return redirect('/');

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

        return view('add_forms.add_announcement', [
            'fields'               => $fields,
            'terms'                => $terms,
            'regions'              => $regions,
            'municipality_regions' => $municipality_regions,
            'quarter'              => $quarter,
            'month'                => $month,
            'type'                 => $type
        ]);
    }

    public function store_announcement(Request $request)
    {
        if (!Auth::user() || Auth::user()->role != 1)
            return redirect('/');

        $rules = array(
            'term'   => 'required',
            'field'  => 'required',
            'region' => 'required',
            'month'  => 'required',
        );

        $messages = array(
            'term.required'    => 'სწავლების ფორმა სავალდებულოა',
            'field.required'   => 'სწავლების სფერო სავალდებულოა',
            'region.required'  => 'ჩატარების ადგილი სავალდებულოა',
            'month.required'   => 'ჩატარების პერიოდი სავალდებულოა',
        );

        $input    = input::all();
        $file     = Input::file('file');
        if (isset($file) && !empty($file)) {
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'pdf') {
                $rules['pdf']             = 'required';
                $messages['pdf.required'] = 'დასაშვებია მხოლოდ pdf გაფართოების ფაილები';
            }
        }

        $this->validate($request, $rules, $messages);

        if (isset($file) && !empty($file)) {
            $file_name        = str_random(10) . '.' .$file->getClientOriginalExtension();
            $destinationPath  = 'training_pdf';
            $file->move($destinationPath, $file_name);
            $input['file']    = $file_name;
        }

        $training             = Training::create($input);

        foreach (input::get('term') as $term) {
            $training->terms()->attach($term);
        }

        $training->fields()->attach(input::get('field'));
        $training->municipalities()->attach(input::get('municipalities'));

        if(!is_null(input::get('month'))){
            foreach (input::get('month') as $month) {
                $training->months()->attach($month);
            }
        }
        $training->save();

        return redirect('/');
    }

    public function add_seek_announcement()
    {
        if (!Auth::user() || Auth::user()->role != 2)
            return redirect('/');

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

        return view('add_forms.add_seek_announcement', [
            'fields'               => $fields,
            'terms'                => $terms,
            'regions'              => $regions,
            'municipality_regions' => $municipality_regions,
            'type'                 => $type
        ]);
    }

    public function store_seek_announcement(Request $request)
    {
        if (!Auth::user() || Auth::user()->role != 2)
            return redirect('/');

        $rules = array(
            'term'   => 'required',
            'field'  => 'required',
            'region' => 'required',
        );

        $messages = array(
            'term.required'    => 'სწავლების ფორმა სავალდებულოა',
            'field.required'   => 'სწავლების სფერო სავალდებულოა',
            'region.required'  => 'ჩატარების ადგილი სავალდებულოა',
        );

        $input    = input::all();
        $file     = Input::file('file');
        if (isset($file) && !empty($file)) {
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'pdf') {
                $rules['pdf']             = 'required';
                $messages['pdf.required'] = 'დასაშვებია მხოლოდ pdf გაფართოების ფაილები';
            }
        }

        $this->validate($request, $rules, $messages);

        if (isset($file) && !empty($file)) {
            $file_name        = str_random(10) . '.' .$file->getClientOriginalExtension();
            $destinationPath  = 'training_pdf';
            $file->move($destinationPath, $file_name);
            $input['file']    = $file_name;
        }

        $training             = SeekTraining::create($input);

        foreach (input::get('term') as $term) {
            $training->terms()->attach($term);
        }
        $training->fields()->attach(input::get('field'));
        $training->municipalities()->attach(input::get('municipalities'));
        $training->save();

        return redirect('/');
    }

    public function remove_field()
    {
        if (!Auth::user()) {
            return redirect('/');
        }

        $fields = Field::lists('name', 'id');

        return view('remove.remove_field')
            ->with('fields', $fields);
    }

    public function drop_field($id, Request $request)
    {
        if (!Auth::user()) {
            return redirect('/');
        }

        try {
            Field::where('id', '=', $id)->delete();
        } catch (\exception $e) {
            $rules    = ['delete' => 'required'];
            $messages = ['delete.required' => 'წაშლა შეუძლებელია'];
            $this->validate($request, $rules, $messages);
        }

        return redirect('/admin');
    }

    public function remove_term()
    {
        if (!Auth::user()) {
            return redirect('/');
        }

        $terms = Term::lists('name', 'id');

        return view('remove.remove_term')
            ->with('terms', $terms);
    }

    public function drop_term($id, Request $request)
    {
        if (!Auth::user()) {
            return redirect('/');
        }

        try {
            Term::where('id', '=', $id)->delete();
        } catch (\exception $e) {
            $rules    = ['delete' => 'required'];
            $messages = ['delete.required' => 'წაშლა შეუძლებელია'];
            $this->validate($request, $rules, $messages);
        }

        return redirect('/admin');
    }
}
