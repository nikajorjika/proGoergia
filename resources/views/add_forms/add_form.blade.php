{!! Form::open(['action' => $action ]) !!}
<h1> {{ $header }}</h1>
<div class="form-group">
    {!! Form::label('name', 'სახელი:')!!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::submit('ობიექტის დამატება', ['class' => 'btn btn-primary form-control'])!!}
</div>
{!! Form::close() !!}