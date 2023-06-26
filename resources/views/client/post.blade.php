@extends('client.layouts.master')

@section('content')
    @include('client.partials.small-slider')
    @include('client.partials.small-nav')
    <div class="container">
        @if (request()->has('category'))
            @include('client.partials.category-list')
            @include('client.partials.category-table')
        @else
            @include('client.partials.category-img')
        @endif
    </div>
@endsection
