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

    @foreach($fields as $id => $name)
        <p style="display: inline-block;">{{ $name }}</p> <a href="{{ url('/drop_field/' . $id) }}"><span class="glyphicon glyphicon-trash"></span></a>
    @endforeach
@stop
