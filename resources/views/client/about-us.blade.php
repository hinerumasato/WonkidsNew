{{-- New about us --}}

@extends('client.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/about-us.css') }}">
@endsection

@section('content')
    @include('client.partials.small-slider')
    @include('client.partials.small-nav-wonkidsclub')

    <div class="container about mt-4">
        <h2 class="text-center text-uppercase fw-bold text-main">@lang('wonkidsclub.title')</h2>
        <div class="row g-5 mt-1">
            <div class="col-md-5 col-12">
                <img class="w-100 about-img" src="https://wonkidsclub.net/imgs/wonkidsclub/wonkidsclub_title.jpg"
                    alt="">
            </div>
            <div class="col-md-7 col-12">
                <div class="about-content bg-tertiary px-5 h-100 d-flex align-items-center">
                    <p>
                        @lang('wonkidsclub.about')
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container history mt-4">
        <div class="row align-items-center">
            <div class="col-md-4 col-12 d-none d-md-block">
                <div class="line"></div>
            </div>
            <div class="col-md-4 col-12">
                <h2 class="fw-bold text-center text-uppercase text-main">@lang('wonkidsclub.history')</h2>
            </div>
            <div class="col-md-4 col-12 d-none d-md-block">
                <div class="line"></div>
            </div>
        </div>

        <div class="timeline">
            <div class="timeline-item" year="2016" color="#41516C" sub-color="#303E55" direction="left">
                @lang('wonkidsclub.2016')
            </div>
            <div class="timeline-item" year="2017" color="#FBCA3E" sub-color="#DDA80F" direction="right">
                @lang('wonkidsclub.2017')
            </div>
            <div class="timeline-item" year="2019" color="#E24A68" sub-color="#B4374F" direction="left">
                <p>@lang('wonkidsclub.2019.1')</p>
                <p>@lang('wonkidsclub.2019.2')</p>
            </div>
            <div class="timeline-item" year="2020" color="#1B5F8C" sub-color="#174F74" direction="right">
                @lang('wonkidsclub.2020')
            </div>
            <div class="timeline-item" year="2021" color="#4CADAD" sub-color="#347575" direction="left">
                <p>@lang('wonkidsclub.2021.1')</p>
                <p>@lang('wonkidsclub.2021.2')</p>
            </div>
            <div class="timeline-item" year="2022" color="#8D5EAD" sub-color="#5E3F73" direction="right">
                @lang('wonkidsclub.2022')
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/about-us.js') }}"></script>
@endsection