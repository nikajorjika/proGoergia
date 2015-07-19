@extends('master')

@section('body')
    <ul>
        @if(Auth::user()->role == 1)
            <li><a href="{{ url('/add_announcement') }}">ტრენინგის დამატება</a></li>
        @else
            <li><a href="{{ url('/add_seek_announcement') }}">ტრენინგის ძებნა</a></li>
        @endif
        <li><a href="{{ url('/add_field') }}">სწავლების სფეროს დამატება</a></li>
        <li><a href="{{ url('/add_term') }}">სწავლების ფორმის დამატება</a></li>
    </ul>
@stop