@extends('master')

@section('body')
    <ul>
        @if(Auth::user()->role == 1)
            <li><a href="{{ url('/add_announcement') }}">ტრენინგ-პროგრამის დამატება</a></li>
        @else
            <li><a href="{{ url('/add_seek_announcement') }}">ტრენინგ-საჭიროების დამატება</a></li>
        @endif
        <li><a href="{{ url('/add_field') }}">სწავლების სფეროს დამატება</a></li>
        <li><a href="{{ url('/remove_field') }}">სწავლების სფეროს წაშლა</a></li>
        <li><a href="{{ url('/add_term') }}">სწავლების ფორმის დამატება</a></li>
        <li><a href="{{ url('/remove_term') }}">სწავლების ფორმის წაშლა</a></li>
        <li><a href="{{ url('/statistic') }}">სტატისტიკის ნახვა</a></li>
        @if(Auth::user())
            <li><a href="{{ url('/auth/logout') }}">გამოსვლა</a></li>
        @endif
    </ul>
@stop