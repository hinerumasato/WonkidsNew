@php
    use App\Models\Category;
    use App\Models\Language;
    use App\Helpers\LoopHelper;

    $currentLocale = app()->getLocale();
    $currentLanguage = Language::where('locale', $currentLocale)->first();
    $categories = $currentLanguage->categories;
    $categoriesArr = LoopHelper::filterCategory($categories);

    $languages = Language::all();
    $oneLevelCategories = LoopHelper::buildHeaderHTML($categoriesArr);

    // dd($oneLevelCategories);
    // dd(LoopHelper::buildHTML($categories, 'menu_submenu', 'menu_subitem', 12));

@endphp

<header class="home_header">
    <div class="header_left">
        <img src="{{asset('imgs/logo/logo.png')}}" alt="" class="header_logo">
    </div>
    <div class="header_center">
        <ul class="header_menu_list">
            <li class="header_menu_item"><a href="{{route('home.index')}}" class="header_menu_item_link">{{ trans('home.menu-item-1') }}</a></li>
            <li class="header_menu_item">
                <a href="#" class="header_menu_item_link">
                    {{ trans('home.menu-item-2') }}
                    <i class="fa-solid fa-angle-down header_menu_icon"></i>
                </a>
                <ul class="header_submenu">
                    <li class="header_subitem"><a href="{{route('home.about-us')}}" class="header_sublink">Khái quát</a></li>
                    <li class="header_subitem"><a href="{{route('home.operation')}}" class="header_sublink">Điều hành</a></li>
                </ul>
            </li>
            <li class="header_menu_item">
                <a href="#" class="header_menu_item_link">
                    {{ trans('home.menu-item-3') }}
                    <i class="fa-solid fa-angle-down header_menu_icon"></i>
                    <ul class="header_submenu">
                        <li class="header_subitem d-flex">
                            <a href="{{route('posts.index')}}" class="header_sublink">
                                11 Thời Kỳ
                            </a>
                            @php
                                echo LoopHelper::buildHTML($oneLevelCategories, 'menu_submenu', 'menu_subitem', 'menu_sublink');
                            @endphp
                        </li>
                        <li class="header_subitem"><a href="{{route('home.operation')}}" class="header_sublink">Nội dung truyền thông</a></li>
                    </ul>
                </a>
            </li>
            <li class="header_menu_item">
                <a href="#" class="header_menu_item_link">
                    {{ trans('home.menu-item-4') }}
                    <i class="fa-solid fa-angle-down header_menu_icon"></i>
                    <ul class="header_submenu">
                        <li class="header_subitem">
                            <a href="{{route('home.book')}}" class="header_sublink">Wonderful Story Book</a>
                            <ul class="menu_submenu">
                                <li class="menu_subitem"><a href="{{route('home.book')}}" class="menu_sublink">Giới thiệu</a></li>
                                <li class="menu_subitem"><a href="" class="menu_sublink">Chia sẻ tài liệu</a></li>
                            </ul>
                        </li>
                        <li class="header_subitem">
                            <a href="{{route('home.camp')}}" class="header_sublink">Wonderful Story Camp</a>
                            <ul class="menu_submenu">
                                <li class="menu_subitem"><a href="{{route('home.camp')}}" class="menu_sublink">Giới thiệu</a></li>
                                <li class="menu_subitem"><a href="" class="menu_sublink">Chia sẻ tài liệu</a></li>
                            </ul>
                        </li>
                        <li class="header_subitem">
                            <a href="{{route('home.wonkidsclub')}}" class="header_sublink">Wonkids Club</a>
                            <ul class="menu_submenu">
                                <li class="menu_subitem"><a href="{{route('home.wonkidsclub')}}" class="menu_sublink">Giới thiệu</a></li>
                                <li class="menu_subitem"><a href="" class="menu_sublink">Chia sẻ tài liệu</a></li>
                            </ul>
                        </li>
                    </ul>
                </a>
                
            </li>
            
            <li class="header_menu_item">
                <a href="#" class="header_menu_item_link">
                    {{ trans('home.menu-item-5') }}
                    <i class="fa-solid fa-angle-down header_menu_icon"></i>
                </a>
            </li>
            <li class="header_menu_item">
                <a href="#" class="header_menu_item_link">
                    {{ trans('home.menu-item-6') }}
                    <i class="fa-solid fa-angle-down header_menu_icon"></i>
                </a>
                <ul class="header_submenu">
                    @foreach ($languages as $language)
                        <li class="header_subitem">
                            <a href="{{route('change-language', ['locale' => $language->locale])}}" class="header_sublink">{{ $language->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
    <div class="header_right">
        <div class="header_right_languages">
            <a class="locale-link" href="{{route('change-language', ['locale' =>'vi'])}}"><img class="flag-img" src="{{asset('imgs/flags/vietnam-flag-icon-32.png')}}" alt=""></a>
            <a class="locale-link" href="{{route('change-language', ['locale' =>'ko'])}}"><img class="flag-img" src="{{asset('imgs/flags/south-korea-flag-icon-32.png')}}" alt=""></a>
            <a class="locale-link" href="{{route('change-language', ['locale' =>'en'])}}"><img class="flag-img" src="{{asset('imgs/flags/uk-flag-icon-32.png')}}" alt=""></a>
        </div>
    </div>
</header>

<script src="{{ asset('js/fittop.js') }}"></script>
<script>
    fitTop('.menu_submenu', '.menu_subitem');
    fitTop('.menu_submenu', '.header_subitem');
</script>

@push('scripts')
    <script src="{{ asset('js/header.js') }}"></script>
@endpush
