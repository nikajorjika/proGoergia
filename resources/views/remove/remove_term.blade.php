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

    @foreach($terms as $id => $name)
        <p style="display: inline-block;">{{ $name }}</p> <a href="{{ url('/drop_term/' . $id) }}"><span class="glyphicon glyphicon-trash"></span></a>
    @endforeach
@stop
