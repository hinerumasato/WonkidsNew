@extends('client.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/wonderful.css') }}">
@endsection
@section('content')
@include('client.partials.small-slider')
@include('client.partials.small-nav-wonderful')
    <div class="container">
        <h2 class="py-5 fs-1 fw-bold">@lang('book.title')</h2>
        <img class="d-block w-100" src="{{ asset('imgs/books/book1.jpg') }}" alt="">
        <img class="d-block" src="{{ asset('imgs/books/bach_logo.png') }}" alt="">
        <p class="fs-6 my-3 lh-base">
            @lang('book.about-bach')
        </p>
        <img class="d-block w-100" src="{{ asset('imgs/books/book2.jpg') }}" alt="">
        <ul>
            <h2 class="py-3 fs-2 fw-bold">@lang('book.history')</h2>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2007-2009</p>
                <p class="col">@lang('book.h.2007-2009')</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2011</p>
                <p class="col">@lang('book.h.2011')</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2011-2018</p>
                <p class="col">@lang('book.h.2011-2018')</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2014-2019</p>
                <p class="col">@lang('book.h.2014-2019')</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2015</p>
                <p class="col">@lang('book.h.2015')</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2016</p>
                <p class="col">@lang('book.h.2016')</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2017</p>
                <p class="col">@lang('book.h.2017')</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2018</p>
                <p class="col">@lang('book.h.2018')</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2019</p>
                <p class="col">@lang('book.h.2019')</p>
            </li>
        </ul>

        <ul class="mt-3">
            <h2 class="py-3 fs-2 fw-bold">@lang('book.vietnamese-minority-language')</h2>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2014</p>
                <p class="col">@lang('book.l.2014')</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2015</p>
                <p class="col">@lang('book.l.coho.2015')</p>
            </li>
            
            <li class="row mb-2">
                <p class="wonderful-year col-2">2015</p>
                <p class="col">@lang('book.l.mnong.2015')</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2016</p>
                <p class="col">@lang('book.l.ede.2016')</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2016</p>
                <p class="col">@lang('book.l.xtieng.2016')</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2017</p>
                <p class="col">@lang('book.l.2017')</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2018</p>
                <p class="col">@lang('book.l.2018')</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2019</p>
                <p class="col">@lang('book.l.2019')</p>
            </li>
        </ul>
    </div>
@endsection
