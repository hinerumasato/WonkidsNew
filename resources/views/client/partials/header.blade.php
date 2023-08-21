<header class="w-100 d-flex align-items-center home_header justify-content-between">
    <div class="d-xl-none d-block col-2">
        <button class="btn btn-light open-side-nav-btn" data-bs-toggle="offcanvas" data-bs-target="#sidenavOffcanvas">
            <i class="fa-solid fa-bars fs-2"></i>
        </button>
        @include('client.partials.sidenav')
    </div>

    <div class="col-xl-1 col-sm-2 col-4 header_left justify-content-center d-flex">
        <a href="{{route('home.index')}}"><img src="{{ asset('imgs/logo/logo.png') }}" alt="" class="header_logo"></a>
    </div>
    <div class="col-xl-9 d-xl-block d-none header_center align-items-center px-5">
        <ul class="header_menu_list d-xl-flex" style="height: 100%; margin: 0">
            <li class="header_menu_item d-flex justify-content-between">
                <a href="{{ route('home.index') }}"
                    class="header_menu_link">{{ trans('home.menu-item-1') }}
                </a>
            </li>

            <li class="header_menu_item d-flex justify-content-between">
                <a href="#" class="header_menu_link">
                    {{ trans('home.menu-item-4') }}
                    <button class="side-nav-submenu-open-btn">
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
                    <ul class="header_submenu">
                        <li class="header_subitem">
                            <a href="{{ route('home.book') }}" class="header_sublink">
                                @lang('general.book')
                            </a>
                            <ul class="menu_submenu">
                                <li class="menu_subitem"><a href="{{ route('home.book') }}"
                                        class="menu_sublink">@lang('general.introduction')</a></li>
                                <li class="menu_subitem"><a href="" class="menu_sublink">@lang('general.document-share')</a>
                                </li>
                            </ul>
                        </li>
                        <li class="header_subitem">
                            <a href="{{ route('home.camp') }}" class="header_sublink">
                                @lang('general.camp')
                            </a>
                            <ul class="menu_submenu">
                                <li class="menu_subitem"><a href="{{ route('home.camp') }}"
                                        class="menu_sublink">@lang('general.introduction')</a></li>
                                <li class="menu_subitem"><a href="" class="menu_sublink">@lang('general.document-share')</a>
                                </li>
                            </ul>
                        </li>
                        <li class="header_subitem">
                            <a href="{{ route('home.wonkidsclub') }}" class="header_sublink">
                                @lang('general.club')
                            </a>
                            <ul class="menu_submenu">
                                <li class="menu_subitem"><a href="{{ route('home.wonkidsclub') }}"
                                        class="menu_sublink">@lang('general.introduction')</a></li>
                                <li class="menu_subitem"><a href="" class="menu_sublink">@lang('general.document-share')</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </a>
            </li>

            <li class="header_menu_item d-flex justify-content-between">
                <a href="#" class="header_menu_link">
                    {{ trans('home.menu-item-2') }}
                    <button class="side-nav-submenu-open-btn">
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
                </a>
                <ul class="header_submenu">
                    <li class="header_subitem">
                        <a href="{{ route('home.about-us') }}" class="header_sublink">
                            @lang('general.about-us')
                        </a>
                    </li>
                    <li class="header_subitem">
                        <a href="{{ route('home.management') }}" class="header_sublink">
                            @lang('general.management')
                        </a>
                    </li>
                </ul>
            </li>
            <li class="header_menu_item d-flex justify-content-between">
                <a href="#" class="header_menu_link">
                    {{ trans('home.menu-item-3') }}
                    <button class="side-nav-submenu-open-btn">
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
                    <ul class="header_submenu">
                        <li class="header_subitem d-flex">
                            <a href="{{ route('posts.index') }}" class="header_sublink">
                                {{ trans('home.11-period') }}
                            </a>
                            
                            {!! $subCategoriesList !!}
                        </li>
                        <li class="header_subitem">
                            <a href="{{ route('home.media.index') }}" class="header_sublink">{{ trans('home.media-content') }}</a>
                            <ul class="menu_submenu">
                                @foreach ($medias as $media)
                                    <li class="menu_subitem">
                                        <a href="{{route('home.media.index-slug', ['mediaSlug' => $media['slug']])}}" class="menu_sublink">{{ $media['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </a>
            </li>

            <li class="header_menu_item d-flex justify-content-between">
                <a href="#" class="header_menu_link">
                    {{ trans('home.menu-item-6') }}
                    <button class="side-nav-submenu-open-btn">
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
                </a>
                <ul class="header_submenu">
                    @foreach ($languages as $language)
                        <li class="header_subitem">
                            <a href="{{ route('change-language', ['locale' => $language->locale]) }}"
                                class="header_sublink">{{ $language->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="header_menu_item d-flex justify-content-between">
                <a href="#" class="header_menu_link">
                    {{ trans('home.menu-item-5') }}
                    <button class="side-nav-submenu-open-btn">
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
                </a>
            </li>
        </ul>
    </div>
    <div class="col-2 col-xl header_right">
        <div class="header_right_languages d-xl-flex d-none">
            @foreach ($languages as $language)
                <a class="locale-link" href="{{ route('change-language', ['locale' => $language->locale]) }}">
                    <img class="flag-img" src="{{ $language->icon }}" alt="">
                </a>    
            @endforeach
            {{-- <a class="locale-link" href="{{ route('change-language', ['locale' => 'vi']) }}"><img class="flag-img"
                    src="{{ asset('imgs/flags/vietnam-flag-icon-32.png') }}" alt=""></a>
            <a class="locale-link" href="{{ route('change-language', ['locale' => 'ko']) }}"><img class="flag-img"
                    src="{{ asset('imgs/flags/south-korea-flag-icon-32.png') }}" alt=""></a>
            <a class="locale-link" href="{{ route('change-language', ['locale' => 'en']) }}"><img class="flag-img"
                    src="{{ asset('imgs/flags/uk-flag-icon-32.png') }}" alt=""></a> --}}
        </div>
    </div>
</header>

<script src="{{ asset('js/fittop.js') }}"></script>
<script>
    fitTop('.menu_submenu', '.menu_subitem');
    fitTop('.menu_submenu', '.header_subitem');
</script>

@push('scripts')
    <script>
        function setHeaderClass() {
            const header = document.querySelector("header");
            const route = window.location.href;
            const homeURL = @json(route('home.index')) + '/';
            if (homeURL === route.split('?')[0] || homeURL === route.split('#')[0]) {
                header.classList.add("home_header");
                header.classList.remove("other_header");
            } else {
                header.classList.add("other_header");
                header.classList.remove("home_header");
            }
        }

        setHeaderClass();
    </script>
@endpush
