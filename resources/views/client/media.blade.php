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
    @include('client.partials.media-list')
    @include('client.partials.media-table')
@endsection
