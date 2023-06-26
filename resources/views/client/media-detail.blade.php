@extends('client.layouts.master')
@section('content')
    @include('client.partials.small-slider')
    @include('client.partials.small-nav')
    <div class="container">
        {!! $mediaDetail->content !!}
    </div>
@endsection