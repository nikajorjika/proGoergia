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
                <input type="text" id="keyword-search" search_type ='seek-trainings' class="form-control" placeholder="მოძებნეთ...">

            <span class="input-group-btn">
                    <button class="btn btn-default" id="keyword-search-button-seek" type="button">ძებნა!</button>
            </span>
            </div>
        </div>
    </div>
<p align="center"><strong>ადგილობრივი თვითმმართველობის მოხელეთა სწავლების საჭიროებათა რეესტრი</strong></p>
<br/>
    {!! Form::open(['action' => 'SearchController@get_seek_announcements', 'files' => 'true','id'=>'filter-seek-form',  'class' => 'form-horizontal']) !!}

    <div class="form-group">
        <div class="col-sm-2 control-label">
            სწავლების სფერო:
        </div>
        <div class="col-sm-10">
            {!! Form::select('field', with_empty($fields->toArray(),'ნებისმიერი'), null, ['class' => 'field-field
            form-control']) !!}
        </div>
</div>
    <div class="form-group">
        {!! Form::label('region', 'რეგიონი: ', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('region', with_empty($regions->toArray(),'ნებისმიერი'), null, ['class' => 'region_search
            form-control']) !!}
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
        <div class="col-sm-10">&nbsp;</div>
        <div class="col-sm-2">
            {!! Form::submit('ძებნა', ['id'=> 'filter-button','class' => 'btn btn-primary form-control'])!!}
        </div>
    </div>
    {!! Form::close() !!}

    <div id='search-result'>

    </div>
@stop
