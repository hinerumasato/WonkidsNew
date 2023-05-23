<header class="home_header">
    <div class="header_left">
        <img src="{{asset('imgs/logo/logo.png')}}" alt="" class="header_logo">
    </div>
    <div class="header_center">
        <ul class="header_menu_list">
            <li class="header_menu_item"><a href="{{route('index')}}" class="header_menu_item_link">{{ trans('home.menu-item-1') }}</a></li>
            <li class="header_menu_item">
                <a href="#" class="header_menu_item_link">{{ trans('home.menu-item-2') }}</a>
            <ul class="header_submenu">
                    <li class="header_subitem"><a href="/about-us" class="header_sublink">Khái quát</a></li>
                    <li class="header_subitem"><a href="/operation" class="header_sublink">Điều hành</a></li>
                </ul>
            </li>
            <li class="header_menu_item"><a href="#" class="header_menu_item_link">{{ trans('home.menu-item-3') }}</a></li>
            <li class="header_menu_item"><a href="#" class="header_menu_item_link">{{ trans('home.menu-item-4') }}</a></li>
            <li class="header_menu_item"><a href="#" class="header_menu_item_link">{{ trans('home.menu-item-5') }}</a></li>
            <li class="header_menu_item"><a href="#" class="header_menu_item_link">{{ trans('home.menu-item-6') }}</a></li>
        </ul>
    </div>
    <div class="header_right">
        <div class="header_right_languages">
            <a class="locale-link" href=""><img class="flag-img" locale="vi" src="{{asset('imgs/flags/vietnam-flag-icon-32.png')}}" alt=""></a>
            <a class="locale-link" href=""><img class="flag-img" locale="ko" src="{{asset('imgs/flags/south-korea-flag-icon-32.png')}}" alt=""></a>
            <a class="locale-link" href=""><img class="flag-img" locale="en" src="{{asset('imgs/flags/uk-flag-icon-32.png')}}" alt=""></a>
        </div>
    </div>
</header>

@push('scripts')
    <script src="{{ asset('js/header.js') }}"></script>
@endpush