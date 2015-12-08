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
    <div class="registration-form">
        {!! Form::open(['url' => '/user_register', 'class' => 'form-horizontal']) !!}
        <script type="text/javascript" src="http://www.clubdesign.at/floatlabels.js"></script>

        <div class="container">
            <div class="row centered-form">
                <div class="centered-width">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">რეგისტრაცია</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                        {!! Form::text('first_name', null, ['class' => 'form-control input-sm floatlabel','placeholder' => 'სახელი']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                        {!! Form::text('last_name', null, ['class' => 'form-control input-sm ','placeholder' => 'გვარი']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::text('email', null, ['class' => 'form-control input-sm ','placeholder' => 'ელექტრონული ფოსტა']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('personal_id', null, ['class' => 'form-control input-sm ','placeholder' => 'პირადი ნომერი']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('telephone', null, ['class' => 'form-control input-sm ','placeholder' => 'ტელეფონი']) !!}
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            {!! Form::password('password', ['class' => 'form-control input-sm ','placeholder' => 'პაროლი']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            {!! Form::password('password_confirmation', ['class' => 'form-control input-sm ','placeholder' => 'გაიმეორეთ პაროლი']) !!}
                                        </div>
                                    </div>
                                </div>

                                {!! Form::submit('რეგისტრაცია', ['class' => 'btn btn-info btn-block']) !!}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
