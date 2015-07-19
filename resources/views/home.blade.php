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

    <div class="main-page-content">
        <div class="col-sm-6 text-center">
            <a href="/announcements">ტრენინგ-პროგრამები</a>
        </div>
        <div class="col-sm-6 text-center">
            <a href="/seek/announcements">ტრენინგ-საჭიროებები</a>
        </div>
    </div>
@stop
