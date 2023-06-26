@extends('client.layouts.master')
@section('css')
    <style>
        .media-link {
            text-decoration: none;
            color: #000;
        }

        .media-link:hover {
            text-decoration: underline;
        }
    </style>
@endsection
@section('content')
    @include('client.partials.small-slider')
    @include('client.partials.small-nav')
    <div class="container my-5">
        <div class="row">
            <p class="col-3 h4 fw-bold">{{ $type }}</p>
            <p class="col-7 h4 fw-bold">
                {{ $mediaDetail->title }}
            </p>
        </div>

        <div class="content">
            {!! $mediaDetail->content !!}
        </div>
    </div>

    @include('client.partials.media-list')
    @include('client.partials.media-table')
@endsection