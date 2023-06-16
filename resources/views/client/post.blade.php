@extends('client.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
    <link rel="stylesheet" href="{{ asset('css/category-list.css') }}">
@endsection

@section('content')
    @include('client.partials.small-slider')
    @include('client.partials.small-nav')
    <div class="container">
        @include('client.partials.category-list')
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tiêu đề</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $key => $post)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><a href="{{ route('posts.post-detail', ['slug' => $post->slug]) }}">{{ $post->title }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
