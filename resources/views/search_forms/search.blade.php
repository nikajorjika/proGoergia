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
    <div class="container">
        <div class="col-lg-4 float-right margin-bottom-20">
            <div class="input-group">
                <input type="text" id="keyword-search" class="form-control" placeholder="მოძებნეთ...">

            <span class="input-group-btn">
                <button class="btn btn-default" id="keyword-search-button" type="button">ძებნა!</button>
            </span>
            </div>
        </div>
    </div>
    <p align="center"><strong>ადგილობრივი თვითმმართველობის</strong><strong> მოხელეთა </strong><strong>უწყვეტი სწავლების სასწავლო </strong><strong>პროგრამების რეესტრი</strong></p>
    <br/>
    <p> {!! Form::open(['action' => 'SearchController@get_announcements', 'files' => 'true','id'=>'filter-form',  'class' => 'form-horizontal']) !!} </p>
    <div class="form-group">
        <div class="col-sm-2 control-label">
            სწავლების სფერო:
        </div>
        <div class="col-sm-10">
            {!! Form::select('field', with_empty($fields->toArray(),'ნებისმიერი'), null, ['class' => 'field-field form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">
            სწავლების ფორმა:
        </div>
        <div class="col-sm-10">
            {!! Form::select('term', with_empty($terms->toArray(),'ნებისმიერი'), null, ['class' => 'field-term form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('region', 'რეგიონი: ', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('region', with_empty($regions->toArray(),'ნებისმიერი'), null, ['class' => 'region_search form-control']) !!}
        </div>
    </div>
    <div class="form-group display-none" id="municipalities">
        <div class="col-sm-2 control-label">
            მუნიციპალიტეტები:
        </div>
        <div class="municipalities-checkbox-place col-sm-10">

        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">
            პერიოდი:
        </div>
        <div class="col-sm-10">
            <div class="month" style="">
                <div class="col-sm-3">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('month[]', '0', null, ['class' => 'all-period']) !!}
                            ნებისმიერი
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('month[]', '1', null, ['class' => '']) !!}
                            იანვარი
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('month[]', '2', null, ['class' => '']) !!}
                            თებერვალი
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('month[]', '3', null, ['class' => '']) !!}
                            მარტიი
                        </label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="checkbox">&nbsp;</div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('month[]', '4', null, ['class' => '']) !!}
                            აპრილი
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('month[]', '5', null, ['class' => '']) !!}
                            მაისი
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('month[]', '6', null, ['class' => '']) !!}
                            ივნისი
                        </label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="checkbox">&nbsp;</div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('month[]', '7', null, ['class' => '']) !!}
                            ივლისი
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('month[]', '8', null, ['class' => '']) !!}
                            აგვისტო
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('month[]', '9', null, ['class' => '']) !!}
                            სექტემბერი
                        </label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="checkbox">&nbsp;</div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('month[]', '10', null, ['class' => '']) !!}
                            ოქტომბერი
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('month[]', '11', null, ['class' => '']) !!}
                            ნოემბერი
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('month[]', '12', null, ['class' => '']) !!}
                            დეკემბერი
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10">&nbsp;</div>
        <div class="col-sm-2">
            {!! Form::submit('ძებნა', ['id'=> 'filter-button','class' => 'btn btn-primary form-control'])!!}
        </div>
    </div>
    {!! Form::close() !!}

    <div id='search-result'>

    </div>
@stop
