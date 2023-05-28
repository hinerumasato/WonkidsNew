@extends('layouts/master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/post.css')}}">
@endsection

@section('content')
    @include('partials/small-slider')
    <div class="grid">
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
                    <td><a href="{{route('posts.post-detail', ['id' => $post->post_id])}}">{{ $post->title }}</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection