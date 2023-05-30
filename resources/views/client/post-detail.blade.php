@extends('client.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{asset('css/post-detail.css')}}">
@endsection
@section('content')
    @include('client.partials.small-slider')
    <div class="container my-5">
        <div class="post-detail_header row py-4">
            <div class="post-detail_category col-sm-3 col-12">{{ $category }}</div>
            <div class="post-detail_title col-sm-9 col-12">{{ $post["postTitle"] }}</div>
        </div>
        
        <div class="post-detail_content mt-5">
            {!! $post["postContent"] !!}
        </div>
    </div>
@endsection