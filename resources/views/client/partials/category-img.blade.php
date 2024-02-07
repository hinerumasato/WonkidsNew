@push('css')
    <link rel="stylesheet" href="{{asset('css/category-img.css')}}">
@endpush

<div id="categoryNavPills">
    <ul class="nav nav-pills mb-3 mt-5 justify-content-end gap-3" id="pills-tab" role="tablist">
        @foreach ($rootCategories as $key => $value)
            @if ($key == 0)
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-{{ $key }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $key }}" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                        {{ $rootCategoryNames[$key] }}
                    </button>
                </li>
            @else
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-{{ $key }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $key }}" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                        {{ $rootCategoryNames[$key] }}
                    </button>
                </li>
            @endif
        @endforeach
    </ul>
</div>
<div class="mt-5 tab-content" id="pills-tabContent">
    @foreach ($rootCategories as $key => $value)
        @if ($key == 0)
            <div class="tab-pane fade show active" id="pills-{{ $key }}" role="tabpanel" aria-labelledby="pills-{{ $key }}-tab" tabindex="0">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                    @foreach ($allCategories as $index => $category)
                        @if ($category->getRootCategoryId() == $value->id && $category->id != $value->id)
                            <div class="col">
                                <div class="category-card shadow rounded-4">
                                    <div class="category-card-img" style="background-image: url('{{$categoryImgs[$index]}}')"></div>
                                    <div class="category-card-body">
                                        <h5 class="category-card-title">{{$categoryNames[$index]}}</h5>
                                        <p class="category-card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                        <a href="{{route('posts.index')}}?category={{$category['id']}}" class="category-card-btn">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @else
            <div class="tab-pane fade" id="pills-{{ $key }}" role="tabpanel" aria-labelledby="pills-{{ $key }}-tab" tabindex="0">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
                    @foreach ($allCategories as $index => $category)
                        @if ($category->getRootCategoryId() == $value->id && $category->id != $value->id)
                            <div class="col">
                                <div class="category-card shadow">
                                    <div class="category-card-img" style="background-image: url('{{$categoryImgs[$index]}}')"></div>
                                    <div class="category-card-body">
                                        <h5 class="category-card-title">{{$categoryNames[$index]}}</h5>
                                        <p class="category-card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                        <a href="{{route('posts.index')}}?category={{$category['id']}}" class="category-card-btn">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
</div>
