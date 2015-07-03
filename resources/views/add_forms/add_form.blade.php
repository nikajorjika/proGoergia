{!! Form::open(['action' => $action ]) !!}
<h1> {{ $header }}</h1>
<div class="form-group">
    {!! Form::label('name', 'სახელი:')!!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
@if(isset($regions) && !empty($regions))
<div class="form-group">
    {!! Form::label('region_id', 'რეგიონი:')!!}
    {!! Form::select('region_id', $regions, null,['class' => 'form-control']) !!}
</div>
@endif

<div class="form-group">
    {!! Form::submit('ობიექტის დამატება', ['class' => 'btn btn-primary form-control'])!!}
</div>
{!! Form::close() !!}