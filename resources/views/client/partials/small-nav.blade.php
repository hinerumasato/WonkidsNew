@php
    use App\Models\Category;
    use App\Helpers\LoopHelper;
    $categories = Category::all();
    $oneLevelCategories = LoopHelper::buildHeaderHTML($categories);
@endphp

<div class="container">
    <nav>
        <ul class="small-nav_list d-flex justify-content-center">
            <li class="small-nav_item mx-3">
                <a href="{{route('posts.index')}}">11 Thời Kỳ</a>
                <ul class="small-nav_sublist">
                    @foreach ($oneLevelCategories as $category)
                        <li class="small-nav_subitem py-3 px-3"><a href="{{route('posts.index').'?category='.$category['id']}}">{{ $category['name'] }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="small-nav_item mx-3"><a href="">Nội dung truyền thông</a></li>
        </ul>
    </nav>
    <hr>
</div>