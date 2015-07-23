@extends('master')

@section('body')

{!! Form::open(['action' => $action ]) !!}
<h1> {{ $header }}</h1>
<div class="row form-group">
    {!! Form::label('name', 'სახელი:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>
@if(isset($regions) && !empty($regions))
<div class="row form-group">
    {!! Form::label('region_id', 'რეგიონი:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('region_id', $regions, null,['class' => 'form-control']) !!}
    </div>
</div>
@endif

<div class="row form-group">
    <div class="col-sm-10">&nbsp;</div>
    <div class="col-sm-2">
        {!! Form::submit('დამატება', ['class' => 'btn btn-primary add-form-btn form-control']) !!}
    </div>
</div>
{!! Form::close() !!}

@stop