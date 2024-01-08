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

    <div class="popup">
        <div class="popup-inner">
            <div class="popup-icon">
                <i class="fa-regular fa-bell"></i>
            </div>
            <div class="popup-title">@lang('general.popup.notification')</div>
            <div class="popup-content">
                <p>@lang('general.download-popup')</p>
            </div>
            <div class="popup-button-group">
                <button class="popup-submit-button">@lang('general.popup.submit')</button>
                <button class="popup-cancel-button">@lang('general.popup.cancel')</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="module" src="{{ asset('js/postDetailContent.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
@endsection