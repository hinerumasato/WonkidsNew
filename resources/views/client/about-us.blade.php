{{-- New about us --}}

@extends('client.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/about-us.css') }}">
@endsection

@section('content')
    @include('client.partials.small-slider')
    @include('client.partials.small-nav-wonkidsclub')
    <div class="container">
        <h2 class="py-5 fs-1 fw-bold">@lang('wonkidsclub.title')</h2>
        <img src="{{asset('imgs/wonkidsclub/wonkidsclub_title.jpg')}}" alt="" class="w-100">
        <p class="fs-6 lh-base">
            @lang('wonkidsclub.about')
        </p>

        <ul>
            <h2 class="py-5 fs-1 fw-bold">@lang('wonkidsclub.history')</h2>
            <li class="d-flex mb-3">
                <p class="about-year">2016</p>
                <p>@lang('wonkidsclub.2016')</p>
            </li>
            <li class="d-flex mb-3">
                <p class="about-year">2017</p>
                <p>@lang('wonkidsclub.2017')</p>
            </li>
            <li class="d-flex mb-3">
                <p class="about-year">2019</p>
                <div class="wrap">
                    <p>@lang('wonkidsclub.2019.1')</p>
                    <p>@lang('wonkidsclub.2019.2')</p>
                </div>
            </li>

            <li class="d-flex mb-3">
                <p class="about-year">2020</p>
                <div class="wrap">
                    <p>@lang('wonkidsclub.2020')</p>
                </div>
            </li>

            <li class="d-flex mb-3">
                <p class="about-year">2021</p>
                <div class="wrap">
                    <p>@lang('wonkidsclub.2021.1')</p>
                    <p>@lang('wonkidsclub.2021.2')</p>
                </div>
            </li>

            <li class="d-flex mb-3">
                <p class="about-year">2022</p>
                <div class="wrap">
                    <p>@lang('wonkidsclub.2022')</p>
                </div>
            </li>

            <li class="d-flex mb-3">
                <p class="about-year">2023</p>
                <div class="wrap">
                    <p>@lang('wonkidsclub.2023')</p>
                </div>
            </li>
        </ul>
    </div>
@endsection
