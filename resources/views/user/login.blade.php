@extends('master')

@section('body')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="login-form">
        {!! Form::open(['url' => '/user/auth', 'class' => 'form-horizontal form-signin']) !!}
        <div class="form-group">
            {!! Form::label('name', 'სახელი: ', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('password', 'პაროლი: ', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                &nbsp;
            </div>
            <div class="col-sm-6">
                {!! Form::submit('ავტორიზაცია', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop