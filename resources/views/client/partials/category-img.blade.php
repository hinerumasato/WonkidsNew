@php
    use App\Models\Category;
    $categoryModel = new Category();
    $oneLevelCategories = $categoryModel->getOneLevelCategories();
@endphp

<div class="row row-cols-3 row-cols-md-6 py-5 ">
    @foreach ($oneLevelCategories as $category)
        <div class="col my-2">
            <a href="{{route('posts.index', ['category' => $category['id']])}}" class="d-block w-100 h-100">
                <img src="{{$categoryModel->find($category['id'])->img}}" alt="" class="w-100 h-100">
            </a>
        </div>
    @endforeach
</div>