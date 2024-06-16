@push('css')
    <link rel="stylesheet" href="{{ asset('/css/breadcumb.css') }}">
@endpush

<nav style="--bs-breadcrumb-divider: '{{ $divider }}';" aria-label="breadcrumb" class="bg-tertiary p-2">
    <ol class="breadcrumb">
        @foreach ($options as $name => $link)
            <li class="breadcrumb-item"><a href="{{ $link }}">{{ $name }}</a></li>
            @endforeach
        <li class="breadcrumb-item active" aria-current="page">{{ $current }}</li>
    </ol>
</nav>
