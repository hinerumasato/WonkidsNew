<nav style="--bs-breadcrumb-divider: '{{ $divider }}';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach ($options as $name => $link)
            <li class="breadcrumb-item"><a href="{{ $link }}">{{ $name }}</a></li>
            @endforeach
        <li class="breadcrumb-item active" aria-current="page">{{ $current }}</li>
    </ol>
</nav>
