@extends('master')

@section('body')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script type="text/javascript" src="test.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['url' => '/user_auth', 'class' => 'form-horizontal']) !!}
    <section id="login">
    <div class="container" id="zoro">
        <h4 style="text-align: center; color: darkblue; margin: 0 0 50px;">თუ უკვე დარეგისტრირებული ხართ ელექტრონულ ბაზაში, გაიარეთ ავტორიზაცია</h4>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-wrap">
                    <div class="form-group">
         {!! Form::text('personal_id', null, ['class' => 'form-control','placeholder' => 'შეიყვანეთ პირადი ნომერი']) !!}
                        </div>
                        <div class="form-group">
         {!! Form::password('password', ['class' => 'form-control','placeholder' => 'პაროლი', 'id'=>'password']) !!}
                        </div>
                        <div class="checkbox">
                            <span class="character-checkbox"  onclick="showPassword()"></span>
                            <span class="label">პაროლის ჩვენება</span>
                        </div>
         {!! Form::submit('შესვლა', ['class' => 'btn btn-custom btn-lg btn-block']) !!}
                    <a href="/script.js" class="forget" data-toggle="modal" data-target=".forget-modal">პაროლის აღდგენა</a>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    </section>
    {!! Form::close() !!}

<h4 style="text-align: center; color: darkblue; margin: 0 0 20px;">თუ ჯერ არ ხართ დარეგისტრირებული ელექტრონულ ბაზაშია გაიარეთ</h4>
<h4 style="text-align: center; margin: 10px 0 20px;"><a href="{{ url('/user_register') }}" style="font-weight: bold; color: darkblue !important;">ელექტრონული რეგისტრაცია</a></h4>

<div class="modal fade forget-modal"  tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">x</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">პაროლის აღდგენა</h4>
            </div>
            <div class="modal-body">
                <p>შეიყვანეთ ელექტრონული ფოსტა</p>
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">გაუქმება</button>
                <button type="button" class="btn btn-custom">მოთხოვნის გაგზავნა</button>
            </div>
        </div>
    </div>
</div>

    @stop