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

    <a href="/announcements">მოძებნე ტრენინგს</a>
    <a href="/seek/announcements">ჩაატარე ტრენინგი</a>
@stop
