@extends('master')

@section('body')
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>განმცხადებელი</th>
                <th>საქონტაქტო პირი</th>
                <th>სწავლების სფერო </th>
                <th>პროგრამის დასახელება</th>
                <th>სრულად ნახვა</th>
            </tr>
            </thead>
            <tbody>

            @foreach($declerations as $key=>$decleration)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ str_limit($decleration -> applicant,50) }}</td>
                    <td>{{ str_limit($decleration -> contact_person,50) }}</td>
                    <td>{{ str_limit($decleration->field->name,50) }}</td>
                    <td>{{ str_limit($decleration->edu_program_name,50) }}</td>
                    <td style="text-align: center"><a href="{{ url('/admin/viewmore/' . $decleration->id) }}"><span class="glyphicon glyphicon-log-in" style="font-size: 20px"></span></a></td>
                </tr>
            @endforeach

            </tbody>
        </table>

    @stop