<?php

namespace App\Http\Controllers;

use App\SeekTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Month;
use App\Municipality;
use App\Quarter;
use App\Region;
use App\Field;
use App\Term;
use App\Training;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function edit_seek_announcement($id)
    {
        if (!Auth::user() || Auth::user()->role != 2)
            return redirect('/');

        $fields   = Field::orderBy('name')->lists('name', 'id');
        $terms    = Term::lists('name', 'id');
        $municipalities = Municipality::lists('name', 'id');


        $regions        = Region::lists('name', 'id');
        $type           = array(
            0 => 'ვატარებ',
            1 => 'ვეძებ'
        );


        $select =DB::select('SELECT seek_trainings.id, field_seek_training.field_id, municipality_seek_training.municipality_id
                                FROM seek_trainings
                                JOIN field_seek_training ON seek_trainings.id = field_seek_training.seek_training_id
                                JOIN municipality_seek_training ON seek_trainings.id = municipality_seek_training.seek_training_id
                                where seek_trainings.id = '.$id.'
                                group by seek_trainings.id');

        $select=$select[0];
        $seek_training_filtered_array = [];
        $seek_training_filtered       = new \stdClass();
        $seek_training_instance       = SeekTraining::find($select->id);
        $training_terms               = DB::select('SELECT terms.name FROM seek_training_term JOIN terms ON terms.id = seek_training_term.term_id WHERE seek_training_id = '.$seek_training_instance->id);

        $training_terms_array = [];
        foreach($training_terms as $term){
            $training_terms_array[] = $term->name;
        }
        $seek_training_field                            = Field::find($select->field_id);
        $seek_training_municipality                     = Municipality::find($select->municipality_id);
        $seek_training_filtered->id                     = $seek_training_instance->id;
        $seek_training_filtered->header                 = $seek_training_instance->name;
        $seek_training_filtered->description            = $seek_training_instance->description;
        $seek_training_filtered->file                   = $seek_training_instance->file;
        $seek_training_filtered->link                   = $seek_training_instance->link;
        $seek_training_filtered->per                    = $seek_training_instance->per;
        $seek_training_filtered->contact                = $seek_training_instance->contact;
        $seek_training_filtered->quantity               = $seek_training_instance->quantity;
        $seek_training_filtered->field['name']          = $seek_training_field->name;
        $seek_training_filtered->field['id']            = $seek_training_field->id;
        $seek_training_filtered->terms                  = $training_terms_array;
        $seek_training_filtered->municipality['name']   = $seek_training_municipality->name;
        $seek_training_filtered->municipality['id']     = $seek_training_municipality->id;
        $seek_training_filtered->region                 = $seek_training_municipality->region_id;
        $seek_training_filtered->isAdmin                = Auth::check();
//        print_r($seek_training_filtered);
//        die();

        return view('edit.edit_seek_announcement', [
            'fields'               => $fields,
            'terms'                => $terms,
            'regions'              => $regions,
            'municipalities' => $municipalities,
            'type'                 => $type,
            'training'             => $seek_training_filtered
        ]);

    }

    public function save_seek_announcement(Request $request)
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
        $training_to_delete = SeekTraining::find(input::get('id'));
        $training_to_delete->delete();

        $training             = SeekTraining::create($input);

        foreach (input::get('term') as $term) {
            $training->terms()->attach($term);
        }
        $training->fields()->attach(input::get('field'));
        $training->municipalities()->attach(input::get('municipalities'));
        $training->save();

        return redirect('/');
    }

    public function edit_announcement($id)
    {
        $fields         = Field::orderBy('name')->lists('name', 'id');
        $terms          = Term::lists('name', 'id');
        $municipalities = Municipality::lists('name','id');
        $regions        = Region::lists('name', 'id');
        $type           = array(
            0 => 'ვატარებ',
            1 => 'ვეძებ'
        );

        $quarter = Quarter::all()->lists('name','id');
        $months  = Month::all()->lists('name','id');
        $select  = DB::select(' SELECT trainings.id, field_training.field_id, term_training.term_id, municipality_training.municipality_id, month_training.month_id
                                FROM trainings
                                JOIN field_training ON trainings.id = field_training.training_id
                                JOIN term_training ON trainings.id = term_training.training_id
                                JOIN municipality_training ON trainings.id = municipality_training.training_id
                                JOIN month_training ON trainings.id = month_training.training_id
                                where trainings.id = '.$id.'
                                group by trainings.id
                   ');

        $select=$select[0];
        $training_filtered    = new \stdClass();
        $training_instance    = Training::find($select->id);
        $training_field       = Field::find($select->field_id);
        $training_municipality= Municipality::find($select->municipality_id);
        $training_months      = DB::select('SELECT months.name FROM month_training JOIN months ON months.id = month_training.month_id WHERE training_id = '.$training_instance->id);
        $training_terms       = DB::select('SELECT terms.name FROM term_training JOIN terms ON terms.id = term_training.term_id WHERE training_id = '.$training_instance->id);

        foreach($training_months as $month){
            $training_months_array[] = $month->name;
        }

        foreach($training_terms as $term){
            $training_terms_array[] = $term->name;

        }
        $training_filtered->id                  = $training_instance->id;
        $training_filtered->header              = $training_instance->name;
        $training_filtered->description         = $training_instance->description;
        $training_filtered->file                = $training_instance->file;
        $training_filtered->link                = $training_instance->link;
        $training_filtered->field['name']       = $training_field->name;
        $training_filtered->field['id']         = $training_field->id;
        $training_filtered->months              = $training_months_array;
        $training_filtered->terms               = $training_terms_array;
        $training_filtered->municipality['name']= $training_municipality->name;
        $training_filtered->municipality['id']  = $training_municipality->id;
        $training_filtered->region              = $training_municipality->region_id;
        $training_filtered->isAdmin             = Auth::check();

        return view('edit.edit_announcement', [
            'fields'                => $fields,
            'terms'                 => $terms,
            'regions'               => $regions,
            'municipalities'        => $municipalities,
            'quarter'               => $quarter,
            'month'                 => $months,
            'type'                  => $type,
            'training'              => $training_filtered
        ]);
    }

    public function save_announcement(Request $request)
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
        $training_to_delete             = Training::find(input::get('id'));
        $training_to_delete->delete();
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
}