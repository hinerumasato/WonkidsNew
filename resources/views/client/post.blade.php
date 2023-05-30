@extends('client.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/post.css')}}">
@endsection

@section('content')
    @include('client.partials.small-slider')
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
                    <td><a href="{{route('posts.post-detail', ['slug' => $post->slug])}}">{{ $post->title }}</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection