@extends('layouts/master')
@section('content')
    @include('partials/small-slider')
    <div class="grid">
        <table class="table table-bordered border-primary">
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
                    <td>{{ $post->title }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection