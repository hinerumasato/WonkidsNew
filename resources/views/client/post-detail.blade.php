@extends('client.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{asset('css/post-detail.css')}}">
@endsection
@section('content')
@include('client.partials.small-slider')
    <div class="container my-5">
        <div class="post-detail_header">
            <div class="post-detail_header_title_wrap d-md-flex d-block py-4">
                <div class="fw-bold post-detail_category me-3 pe-3">{{ $category }}</div>
                <div class="fw-bold post-detail_title">{{ $post["postTitle"] }}</div>
            </div>

            <div class="post-detail_header_info d-flex justify-content-center justify-content-md-start gap-3 fs-7 text-secondary">
                <div class="post-detail-author text-center">
                    <i class="fa-regular fa-user d-block d-md-inline"></i>
                    {{ $post["postAuthor"] }}
                </div>
                {{-- <div class="post-detail-time text-center">
                    <i class="fa-regular fa-clock d-block d-md-inline"></i>
                    {{ $post["postTime"] }}
                </div> --}}
                <div class="post-detail-view text-center">
                    <i class="fa-regular fa-eye d-block d-md-inline"></i>
                    @lang('general.viewed'): {{ $post["postView"] }}
                </div>
            </div>
        </div>

        <div class="post-detail_content mt-5">
            {!! $post["postContent"] !!}
        </div>
    </div>

    <div class="container mt-5">
        @include('client.partials.category-list')
        @include('client.partials.category-table')
    </div>
@endsection