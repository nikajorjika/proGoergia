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
    {!! Form::label('long_desc', 'ვრცელი აღწერა: ') !!}
    {!! Form::textarea('long_desc', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('study_field', 'სწავლების სფერო: ') !!}
    {!! Form::select('study_field', $study_fields, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('study_term', 'სწავლების სფერო: ') !!}
    {!! Form::select('study_term', $study_terms, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('municipality', 'სწავლების სფერო: ') !!}
    {!! Form::select('municipality', $municipalities, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('quantity', 'მონაწილეთა რაოდენობა: ') !!}
    {!! Form::input('number', 'quantity', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('file', 'ფაილის ატვირთვა: ') !!}
    {!! Form::file('file', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('contact', 'საკონტაქტო პირი: ') !!}
    {!! Form::text('contact', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('type', 'ვატარებ თუ ვეძებ: ') !!}
    {!! Form::select('type', $type, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('დამატება', ['class' => 'btn btn-primary form-control'])!!}
</div>
{!! Form::close() !!}