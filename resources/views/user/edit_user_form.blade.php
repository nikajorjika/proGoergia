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

            {!! Form::model( $decleration,['method' => 'PATCH', 'action'=> ['UserController@update', $decleration->id]]) !!}

            @include('user.user_form', ['submitButton' => 'რედაქტირება'])

            {!! Form::close() !!}

@stop