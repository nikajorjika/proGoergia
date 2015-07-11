<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
{!! Form::open(['action' => 'AddController@store_announcement' ]) !!}
<h1>განცხადების დამატება</h1>

<div class="form-group">
    {!! Form::label('header', 'სათაური: ')!!}
    {!! Form::text('header', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('short_desc', 'მოკლე აღწერა: ') !!}
    {!! Form::textarea('short_desc', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('file', 'ფაილის ატვირთვა: ') !!}
    {!! Form::file('file', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('header', 'ვებ ბმული(Link): ')!!}
    {!! Form::text('header', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('study_field', 'სწავლების სფერო: ') !!}

    @for($i=0; $i<=count($study_fields); $i++)
        @if(isset($study_fields[$i]))
        </br>
        {!! Form::label('field', $study_fields[$i]) !!}
        {!! Form::checkbox('study_field[]', $i , null, ['id' => $i, 'class' => 'form-control']) !!}
        @endif
    @endfor
</div>
<div class="form-group">
    {!! Form::label('study_term', 'სწავლების ფორმა: ') !!}
    @for($i=0; $i<=count($study_terms); $i++)
        @if(isset($study_terms[$i]))
            </br>
            {!! Form::label('field', $study_terms[$i]) !!}
            {!! Form::checkbox('study_term[]', $i , null, ['id' => $i, 'class' => 'form-control']) !!}
        @endif
    @endfor
</div>
<div class="form-group">
    {!! Form::label('region', 'ჩატარების ადგილი: ') !!}
    {!! Form::select('region',  with_empty($regions->toArray(),'აირჩიეთ რეგიონი'),null, ['class' => 'region form-control']) !!}
</div>
<div class="form-group" id="municipalities">
    {!! Form::label('location_municipalities', 'მუნიციპალიტეტები: ') !!}
    @foreach($municipality_regions as $municipality)
        <div class="all_m" style="display: none" data_region="{{ $municipality['region']->id }}" data_municipality="{{ $municipality['municipality']->id }}">
            {!! Form::label('municipalities[]', $municipality['municipality']->name) !!}
            {!! Form::checkbox('municipalities[]', $municipality['municipality']->id, null, ['class' => 'form-control']) !!}
        </div>
    @endforeach
</div>

<div class="form-group">
    {!! Form::submit('დამატება', ['class' => 'btn btn-primary form-control'])!!}
</div>
{!! Form::close() !!}

{!! Html::script('js/script.js'); !!}