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

    {!! Form::model($decleration, ['method' => 'PATCH', 'action'=> ['UserController@update', $decleration->id], 'class' => 'form-horizontal','files'=> 'true']) !!}

    @include('user.user_form',
        [
            'submitButton'         => 'რედაქტირება',
            'dec_learnmethods'     => $dec_learnmethods,
            'dec_estimations'      => $dec_estimations,
            'dec_certificaterules' => $dec_certificaterules,
            'dec_materials'        => $dec_materials,
        ])

    {!! Form::close() !!}

@stop