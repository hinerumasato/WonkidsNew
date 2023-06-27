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

<div class="container mt-5 mb-4">
    <nav>
        <ul class="small-nav_list d-flex justify-content-center">
            <li class="small-nav_item mx-3">
                <a href="{{route('posts.index')}}">
                    {{ trans('home.11-period') }}
                    <i class="fa-solid fa-angle-down" style="font-size: 9px"></i>
                </a>
                @php
                    echo LoopHelper::buildHTML($oneLevelCategories, 'small-nav_sublist', 'small-nav_subitem', 'small-nav_sublink');
                @endphp
            </li>
            <li class="small-nav_item mx-3">
                <a href="{{route('home.media.index')}}">
                    {{ trans('home.media-content') }}
                    <i class="fa-solid fa-angle-down" style="font-size: 9px"></i>
                </a>
            </li>
        </ul>
    </nav>
    <hr>
</div>

@push('scripts')
    <script src="{{ asset('js/fittop.js') }}"></script>
    <script>
        const windowLink = window.location.href;
        const smallNavItems = document.querySelectorAll('.small-nav_item')
        smallNavItems.forEach(item => {
            const link = item.querySelector('a').getAttribute('href');
            if(windowLink.includes(link))
                item.classList.add('active');
        });
        fitTop('.small-nav_sublist', '.small-nav_subitem');
    </script>
@endpush