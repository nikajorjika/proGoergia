@extends('master')

@section('body')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                @if (isset($pdf_error) && !empty($pdf_error))
                    <li>{{ $pdf_error }}</li>
                @endif
            </ul>
        </div>
    @endif
    {!! Form::open(['action' => 'EditController@save_seek_announcement', 'files' => 'true', 'class' => 'form-horizontal']) !!}
    <h1>ტრენინგ-საჭიროების დამატება</h1>
    <div class="form-group" style="display: none;">
        {!! Form::label('id', 'ID: ', ['class' => 'col-sm-2 control-label'])!!}
        <div class="col-sm-10">
            {!! Form::text('id', $training->id, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('name', 'სათაური: ', ['class' => 'col-sm-2 control-label'])!!}
        <div class="col-sm-10">
            {!! Form::text('name', $training->header, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('description', 'მოკლე აღწერა: ', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('description', $training->description, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('file', 'ფაილის ატვირთვა: ', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('file', ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('link', 'ვებ ბმული(Link): ', ['class' => 'col-sm-2 control-label'])!!}
        <div class="col-sm-10">
            {!! Form::text('link', $training->link, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">
            სწავლების სფერო:
        </div>
        <div class="col-sm-10">
            {!! Form::select('field', with_empty($fields->toArray(),'აირჩიეთ სფერო'), $training->field, ['class' => 'field form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('region', 'ჩატარების ადგილი: ', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('region', with_empty($regions->toArray(),'აირჩიეთ რეგიონი'),$training->region, ['class' => 'region form-control']) !!}
        </div>
    </div>
    <div class="form-group" id="municipalities">
        <div class="col-sm-2 control-label">
            მუნიციპალიტეტები:
        </div>
        <div class="col-sm-10">
            {!! Form::select('municipalities', with_empty($municipalities->toArray(),'აირჩიეთ მუნიციპალიტეტი'),$training->region, ['id'=>"municipalities-select",'class' => 'municipalities form-control' ]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('contact', 'საკონტაქტო პირი: ', ['class' => 'col-sm-2 control-label'])!!}
        <div class="col-sm-10">
            {!! Form::text('contact', $training->contact, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('quantity', 'მონაწილეთა რაოდენობა: ', ['class' => 'col-sm-2 control-label'])!!}
        <div class="col-sm-10">
            {!! Form::text('quantity', $training->quantity, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10">&nbsp;</div>
        <div class="col-sm-2">
            {!! Form::submit('დამატება', ['class' => 'btn btn-primary form-control'])!!}
        </div>
    </div>
    {!! Form::close() !!}
@stop
