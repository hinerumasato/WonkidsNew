@push('css')
    <link rel="stylesheet" href="{{asset('css/category-img.css')}}">
@endpush

<div class="row row-cols-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 py-5 ">
    @foreach ($categoriesData as $data)
        <div class="col my-2 category-wrap">
            <a href="{{ route('posts.index', ['category' => $data->id]) }}" class="text-decoration-none d-block w-100 h-100 text-dark">
                <img data-src="{{ $data->img }}"
                    src="{{ asset('imgs/transparent/transparent.png') }}" alt="" class="category-img w-100 placeholder" height="80%">
                
                <p class="category-name text-center fw-bold mt-3">{{ $data->name }}</p>
            </a>
        </div>
    @endforeach
</div>
