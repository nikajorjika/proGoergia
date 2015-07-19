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

    <div class="main-page-content">
        <p class="text-center"><strong>მუნიციპალიტეტების საჯარო მოხელეთა კვალიფიკაციის ამაღლების პროგრამები</strong></p>
        <p class="text-center">კავლიფიკაციის ამაღლების პროგრამის ძიება  შეგიძლიათ დაიწყოთ აქ</p>
        <div class="text-center main-page-img">
            <a href="/announcements">
                <img src="/images/gray-programs.jpg">
            </a>
        </div>

        <p class="text-center"><strong>მუნიციპალიტეტების მოხელეთა ტრენინგ-საჭიროებები</strong></p>
        <p class="text-center">მუნიციპალიტეტების მოხელეთა ტრენინგ-საჭიროებების  ძიება  შეგიძლიათ დაიწყოთ აქ</p>
        <div class="text-center main-page-img">
            <a href="/seek/announcements">
                <img src="/images/gray-needs.jpg">
            </a>
        </div>
    </div>
@stop
