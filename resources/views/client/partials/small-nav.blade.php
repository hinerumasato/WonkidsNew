@php
    use App\Models\Category;
    use App\Models\Language;
    use App\Helpers\LoopHelper;

    $currentLocale = app()->getLocale();
    $currentLanguage = Language::where('locale', $currentLocale)->first();
    $categories = $currentLanguage->categories;
    $categoriesArr = [];
    foreach($categories as $category) {
        $temp = [];
        $temp['id'] = $category->id;
        $temp['name'] = $category->pivot->name;
        $temp['parent_id'] = $category->parent_id;
        $categoriesArr[] = $temp;
    }

    $oneLevelCategories = LoopHelper::buildHeaderHTML($categoriesArr);
@endphp

<div class="container">
    <nav>
        <ul class="small-nav_list d-flex justify-content-center">
            <li class="small-nav_item mx-3">
                <a href="{{route('posts.index')}}">11 Thời Kỳ</a>
                @php
                    echo LoopHelper::buildHTML($oneLevelCategories, 'small-nav_sublist', 'small-nav_subitem', 'small-nav_sublink');
                @endphp
            </li>
            <li class="small-nav_item mx-3"><a href="">Nội dung truyền thông</a></li>
        </ul>
    </nav>
    <hr>
</div>

<script src="{{ asset('js/fittop.js') }}"></script>
<script>
    fitTop('.small-nav_sublist', '.small-nav_subitem');
</script>