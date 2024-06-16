@extends('client.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/wonderful.css') }}">
@endsection
@section('content')
    @include('client.partials.small-slider')
    @include('client.partials.small-nav-wonderful')
    <div class="container">
        <h2 class="py-5 fs-1 fw-bold">@lang('camp.title')</h2>
        <img src="{{asset('imgs/camps/camp_title.jpg')}}" alt="" class="w-100">
        <img src="{{asset('imgs/camps/bridge_logo.png')}}" alt="" class="w-100">
        <p class="fs-6 lh-base">
            @lang('camp.about-camp')
        </p>

        <ul>
            <h2 class="py-5 fs-1 fw-bold">@lang('camp.history')</h2>
            <li class="row mb-3">
                <p class="col-2 wonderful-year">2011</p>
                <p class="col">@lang('camp.2011')</p>
            </li>
            <li class="row mb-3">
                <p class="col-2 wonderful-year">2012</p>
                <div class="wrap col">
                    <p>@lang('camp.2012.1')</p>
                    <p>@lang('camp.2012.2')</p>
                </div>
            </li>
            <li class="row mb-3">
                <p class="col-2 wonderful-year">2014</p>
                <div class="wrap col">
                    <p>@lang('camp.2014.1')</p>
                    <p>@lang('camp.2014.2')</p>
                </div>
            </li>
            <li class="row mb-3">
                <p class="col-2 wonderful-year">2015</p>
                <div class="wrap col">
                    <p>@lang('camp.2015.1')</p>
                    <p>@lang('camp.2015.2')</p>
                </div>
            </li>
            <li class="row mb-3">
                <p class="col-2 wonderful-year">2016</p>
                <p class="col">@lang('camp.2016')</p>
            </li>
            <li class="row mb-3">
                <p class="col-2 wonderful-year">2017</p>
                <p class="col">@lang('camp.2017')</p>
            </li>
            <li class="row mb-3">
                <p class="col-2 wonderful-year">2018</p>
                <div class="wrap col">
                    <p>@lang('camp.2018.1')</p>
                    <p>@lang('camp.2018.2')</p>
                </div>
            </li>
            <li class="row mb-3">
                <p class="col-2 wonderful-year">2019</p>
                <p class="col">@lang('camp.2019')</p>
            </li>
        </ul>
        <p class="text-center fs-4">@lang('camp.description')</p>
    </div>
@endsection