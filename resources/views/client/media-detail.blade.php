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

        iframe {
            max-width: 100%;
        }

        @media (max-width: 768px) {

            .detail-header {
                border: solid 1px #C7C8C9;
                padding: 16px;
            }

            .detail-header > p:first-child {
                border-bottom: solid 1px #C7C8C9;
                padding-bottom: 16px;
                border-right: transparent !important;
            }

            .detail-header > p {
                text-align: center
            }
        }
    </style>
@endsection
@section('content')
    @include('client.partials.small-slider')
    @include('client.partials.small-nav')
    <div class="container my-5">
        <div class="d-md-flex d-block detail-header">
            <p class="h4 fw-bold me-3 pe-3" style="border-right: solid 1px #C7C8C9;">{{ $type }}</p>
            <p class="h4 fw-bold">
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