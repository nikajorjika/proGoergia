@extends('master')

@section('body')
    <h1 class="field-statistic-header">სწავლების სფეროს სტატისტიკის ნახვა</h1>

    <div class="row">
        <div class="form-group">
            {!! Form::label('field', 'სწავლების სფერო: ', ['class' => 'col-sm-2 control-label'])!!}
            <div class="col-sm-10">
                {!! Form::select('field', with_empty($fields->toArray(),'აირჩიეთ სფერო'), null, ['class' => 'field form-control']) !!}
            </div>
        </div>
    </div>

    <div class="statistic-country">
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>ქვეყანა</th>
                <th>მონაწილეთა რაოდენობა</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <div class="statistic-regions">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>რეგიონი</th>
                    <th>მონაწილეთა რაოდენობა</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <div class="statistic-municipalities">
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>მუნიციპალიტეტი</th>
                <th>მონაწილეთა რაოდენობა</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@stop