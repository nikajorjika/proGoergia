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
    <div class="col-lg-4" style="margin-left: 85%; margin-bottom: 2%; margin-top: 0;">
        <div class="input-group">
            <input type="text" id="keyword-search" class="form-control" placeholder="მოძებნეთ...">

            <span class="input-group-btn">
                <button class="btn btn-default" id="keyword-search-button" type="button">ძებნა!</button>
            </span>
        </div>
    </div>
    {!! Form::open(['action' => 'SearchController@get_announcements', 'files' => 'true','id'=>'filter-form',  'class' => 'form-horizontal']) !!}

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
        {!! Form::label('region', 'ჩატარების ადგილი: ', ['class' => 'col-sm-2 control-label']) !!}
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
            <div class="month" style=""><div class="checkbox">
                    <label>
                        {!! Form::checkbox('month[]', '0', null, ['class' => '']) !!}
                        ნებისმიერი
                    </label>
                </div>
                @foreach($month as $key => $mon)
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('month[]', $key, null, ['class' => '']) !!}
                            {{ $mon }}
                        </label>
                    </div>
                @endforeach
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

    <div id = 'search-result'>

    </div>
@stop
