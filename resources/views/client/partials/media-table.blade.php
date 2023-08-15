@push('css')
    <style>
        @media (max-width: 480px) {
            .media-table-title, tbody tr td {
                font-size: 12px;
            }

        }
    </style>
@endpush

<div class="container">
    <table class="table table-hover">
        <thead class="fw-bold">
            <tr>
                <th class="media-table-title col-5 col-lg-2" scope="col">Thể loại</th>
                <th class="media-table-title col-5 col-lg-10" scope="col">Tiêu đề</th>
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

    {!! $medias->links('vendor.pagination.xet_debut') !!}

</div>