@extends('client.layouts.master')

@section('content')
    @include('client.partials.small-slider')
    @include('client.partials.small-nav')
    @include('client.partials.media-list')

    <div class="container">
        <table class="table table-hover">
            <thead class="fw-bold">
                <tr>
                    <th class="col-2" scope="col">Thể loại</th>
                    <th class="col-10" scope="col">Tiêu đề</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($medias as $index => $media)
                    <tr style="cursor: pointer;">
                        <td>{{ $mediaTypes[$index] }}</td>
                        <td>{{ $media->title  }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection