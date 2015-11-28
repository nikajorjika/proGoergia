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
        <p class="text-center"><strong>ადგილობრივი თვითმმართველობის </strong><strong>მოხელეთა</strong><strong> უწყვეტი სწავლების სასწავლო </strong><strong>პროგრამები</strong></p>
        <p class="text-center">უწყვეტი სწავლების სასწავლო  პროგრამის ძიება  შეგიძლიათ დაიწყოთ აქ</p>
        <div class="text-center main-page-img">
            <a href="/announcements">
                <img src="/images/gray-programs.jpg">
            </a>
        </div>

        <p class="text-center"><strong>ადგილობრივი თვითმმართველობის მოხელეთა სწავლების საჭიროებები </strong></p>
        <p class="text-center">ადგილობრივი თვითმმართველობის მოხელეთა სწავლების საჭიროებების  ძიება  შეგიძლიათ დაიწყოთ აქ</p>
        <div class="text-center main-page-img">
            <a href="/seek/announcements">
                <img src="/images/gray-needs.jpg">
            </a>
        </div>
</div>
@stop
