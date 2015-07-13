@extends('master')

@section('body')
{!! Form::open(['action' => 'AddController@store_announcement', 'class' => 'form-horizontal']) !!}
<h1>განცხადების დამატება</h1>

<div class="form-group">
    {!! Form::label('name', 'სათაური: ', ['class' => 'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'მოკლე აღწერა: ', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
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
        {!! Form::text('link', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-2 control-label">
        სწავლების სფერო:
    </div>
    <div class="col-sm-10">
        {!! Form::select('field', with_empty($fields->toArray(),'აირჩიეთ სფერო'), null, ['class' => 'field form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-2 control-label">
        სწავლების ფორმა:
    </div>
    <div class="col-sm-10">
        @for($i=0; $i<=count($terms); $i++)
            @if(isset($terms[$i]))
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('term[]', $i , null, ['id' => $i, 'class' => '']) !!}
                        {{ $terms[$i] }}
                    </label>
                </div>
            @endif
        @endfor
    </div>
</div>
<div class="form-group">
    {!! Form::label('region', 'ჩატარების ადგილი: ', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('region', with_empty($regions->toArray(),'აირჩიეთ რეგიონი'), null, ['class' => 'region form-control']) !!}
    </div>
</div>
<div class="form-group" id="municipalities">
    <div class="col-sm-2 control-label">
        მუნიციპალიტეტები:
    </div>
    <div class="col-sm-10">
        <select name="municipalities" id="municipalities-select" class="municipalities form-control">

        </select>
        @foreach($municipality_regions as $municipality)
            <div class="checkbox" style="display: none">
                <label class="all_m" data_region="{{ $municipality['region']->id }}" data_municipality="{{ $municipality['municipality']->id }}">
                    {!! Form::checkbox('municipalities[]', $municipality['municipality']->id, null, ['class' => '']) !!}
                    {{ $municipality['municipality']->name }}
                </label>
            </div>
        @endforeach
    </div>
</div>
<div class="form-group">
    {!! Form::label('time', 'ჩატარების დრო: ', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('time', [1 => 'აირჩიეთ ჩატარების დრო', 2 => 'კვარტალი', 3 => 'თვე'], null, ['class' => 'time form-control']) !!}
    </div>
</div>
<div class="form-group" id="municipalities">
    <div class="col-sm-2 control-label">
        პერიოდი:
    </div>
    <div class="col-sm-10">
        <div class="quarter" style="display: none">
            @foreach($quarter as $key => $qua)
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('quarter[]', $key, null, ['class' => '']) !!}
                        {{ $qua }}
                    </label>
                </div>
            @endforeach
        </div>
        <div class="month" style="display: none">
            @foreach($month as $key => $mon)
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('month[]', $key, null, ['class' => '']) !!}
                        {{ $mon }}
                    </label>
                </div>
            @endforeach
        </div>
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
