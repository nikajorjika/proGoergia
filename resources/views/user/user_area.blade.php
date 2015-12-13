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

    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <div class="container profile">
        <div class="row">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span3">
                        <img src="http://findicons.com/files/icons/1620/crystal_project/128/personal.png" class="img-polaroid"/>
                    </div>
                    <div class="span2">
                        <h2>Zuria Zuria</h2>
                        <ul class="unstyled">
                            <li><i class="glyphicon glyphicon-phone" style="color: red; font-size: 25px"></i> </li>
                            <li><i class="glyphicon glyphicon-envelope" style="color: red;font-size: 25px"></i> </li>
                        </ul>
                    </div>
                </div>
             </div>




    <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample"
                                    aria-expanded="false" aria-controls="collapseExample">
        განცხადების დამატების ფორმა
    </a>

    <div class="collapse" id="collapseExample" style="width: 1000px; margin: 0 auto;">
        <div class="">
            <a href="{{ url('downloadannoucement') }}">განცხადების ჩამოტვირთვა</a>

            {!! Form::open(['url' => '/add_user_form', 'class' => 'form-horizontal','files'=> 'true']) !!}

            @include('user.user_form',['submitButton' => 'რეგისტრაცია'])

            {!! Form::close() !!}
        </div>
    </div>


    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>სწავლების სფერო</th>
            <th>სწავლების დასახელება </th>
            <th>რედაქტირება</th>
            <th>განაცხადის წაშლა</th>
        </tr>
        </thead>
        <tbody>

        @foreach($declerations as $key=>$decleration)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ str_limit($decleration->field->name,50) }}</td>
                <td>{{ str_limit($decleration -> edu_program_name,50) }}</td>
                <td style="text-align: center"><a href="{{ url('/user_area/edit/' . $decleration->id) }}"><span class="glyphicon glyphicon-edit" style="font-size: 20px"></span></a></td>
                <td style="text-align: center"><a href="{{ url('/user_area/delete/' .$decleration->id) }}"><span class="glyphicon glyphicon-remove" style="color: red; font-size: 20px"></span></a></td>
            </tr>
        @endforeach

        </tbody>
    </table>

@stop