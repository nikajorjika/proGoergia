@extends('master')

@section('body')
    <h1 class="field-statistic-header">სწავლების სფეროს სტატისტიკის ნახვა</h1>

    <div class="form-group">
        {!! Form::label('field', 'სწავლების სფერო: ', ['class' => 'col-sm-2 control-label'])!!}
        <div class="col-sm-10">
            {!! Form::select('field', with_empty($fields->toArray(),'აირჩიეთ სფერო'), null, ['class' => 'field form-control']) !!}
        </div>
    </div>
@stop