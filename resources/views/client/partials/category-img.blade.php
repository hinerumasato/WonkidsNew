@push('css')
    <link rel="stylesheet" href="{{ asset('css/category-img.css') }}">
@endpush
{{-- @foreach ($categoriesData as $data)
        <div class="col my-2 category-wrap">
            <a href="{{ route('posts.index', ['category' => $data->id]) }}" class="text-decoration-none d-block w-100 h-100 text-dark">
                <img data-src="{{ $data->img }}"
                    src="{{ asset('imgs/transparent/transparent.png') }}" alt="" class="category-img w-100 placeholder" height="80%">
                
                <p class="category-name text-center fw-bold mt-3">{{ $data->name }}</p>
            </a>
        </div>
    @endforeach --}}
<section id="categoryImg">

    <ul class="nav nav-pills my-4 gap-3 justify-content-end" id="pills-tab" role="tablist">
        @foreach ($rootCategories as $category)
            <li class="nav-item" role="presentation">
                @if ($loop->first)
                    <button class="nav-link active" id="pills-{{ $category->id }}-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-{{ $category->id }}" type="button" role="tab"
                        aria-controls="pills-{{ $category->id }}" aria-selected="true">
                        {{ $category->languages()->where('locale', app()->getLocale())->first()->pivot->name }}
                    </button>
                @else
                    <button class="nav-link" id="pills-{{ $category->id }}-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-{{ $category->id }}" type="button" role="tab"
                        aria-controls="pills-{{ $category->id }}" aria-selected="true">
                        {{ $category->languages()->where('locale', app()->getLocale())->first()->pivot->name }}
                    </button>
                @endif
            </li>
        @endforeach
    </ul>
    <div class="tab-content" id="pills-tabContent">
        @foreach ($rootCategories as $category)
            <div class="tab-pane fade @if ($loop->first) show active @endif" id="pills-{{ $category->id }}"
                role="tabpanel" aria-labelledby="pills-{{ $category->id }}-tab" tabindex="0">
                <div class="row row-cols-xl-4 row-cols-md-3 row-cols-2 mt-4">
                    @foreach ($categoryMap[$category->id] as $item)
                        @if ($item->active == 1)
                            <div class="col">
                                <div class="card mb-3 py-3 border-0 shadow">
                                    <a class="text-dark text-decoration-none d-block"
                                        href="{{ route('posts.index', ['category' => $item->id]) }}">
                                        <div
                                            style="background-image: url('{{ $item->img }}'); padding-top: 55%; background-size: contain; background-repeat: no-repeat; background-position: center">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ $item->languages()->where('locale', app()->getLocale())->first()->pivot->name }}
                                            </h5>
                                            <p class="card-text card-description">
                                                {{ $item->languages()->where('locale', app()->getLocale())->first()->pivot->description }}
                                            </p>
                                            <p class="card-text mt-3"><a
                                                    href="{{ route('posts.index', ['category' => $item->id]) }}"
                                                    class="card-link">Xem chi tiết</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    
    </div>
</section>
