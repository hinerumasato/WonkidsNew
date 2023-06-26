@extends('client.layouts.master')

@section('css')
    <style>
        .media-link {
            text-decoration: none;
            color: #000;
        }

        .media-link:hover {
            text-decoration: underline;
        }
    </style>
@endsection

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
                        <td>
                            <a class="media-link" href="{{ route('home.media.index-slug', ['mediaSlug' => $mediaSlugs[$index]]) }}">{{ $mediaTypes[$index] }}</a>
                        </td>
                        <td>
                            <a class="media-link" href="{{ route('home.media.detail', ['mediaSlug' => $mediaSlugs[$index], 'detailSlug' => $detailSlugs[$index]]) }}">{{ $media->title }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
