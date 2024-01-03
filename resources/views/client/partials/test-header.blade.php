<header class="shadow bg-white">
    <div class="header-info">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="wrapper d-flex gap-3">
                <div class="header-info-email">
                    <i class="fa-solid fa-envelope"></i>
                    <span>wonkidsclub20@gmail.com</span>
                </div>
                <div class="header-info-phone">
                    <i class="fa-solid fa-phone"></i>
                    <span>0707717745</span>
                </div>
            </div>

            <div class="header-info-follow d-flex gap-2 align-items-center">
                <span>Follow:</span>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-google"></i>
                <i class="fa-brands fa-youtube"></i>
            </div>
        </div>
    </div>

    <div class="header-nav container">
        <nav class="navbar navbar-expand-xl bg-body-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img class="py-2 px-3" src="{{ asset('imgs/logo/logo.png') }}" alt="" width="175" height="82">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="w-100 navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('home.index') }}">
                                {{ trans('home.menu-item-1') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">
                                {{ trans('home.menu-item-2') }}
                                <i class="fa-solid fa-angle-down nav-icon"></i>
                            </a>

                            <ul class="animate__animated animate__fadeInDown animate__faster">
                                <li>
                                    <a href="{{ route('home.about-us') }}" class="header_sublink">
                                        @lang('general.about-us')
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('home.management') }}" class="header_sublink">
                                        @lang('general.management')
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">
                                {{ trans('home.menu-item-3') }}
                                <i class="fa-solid fa-angle-down nav-icon"></i>
                            </a>

                            <ul class="header_submenu animate__animated animate__fadeInDown animate__faster">
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
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">
                                {{ trans('home.menu-item-4') }}
                                <i class="fa-solid fa-angle-down nav-icon"></i>
                            </a>

                            <ul class="header_submenu header-language-list animate__animated animate__fadeInDown animate__faster">
                                <li class="header_subitem">
                                    <a href="{{ route('home.book') }}" class="header_sublink">
                                        @lang('general.book')
                                    </a>
                                </li>
                                <li class="header_subitem">
                                    <a href="{{ route('home.camp') }}" class="header_sublink">
                                        @lang('general.camp')
                                    </a>
                                </li>
                                <li class="header_subitem">
                                    <a href="{{ route('home.wonkidsclub') }}" class="header_sublink">
                                        @lang('general.club')
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">
                                {{ trans('home.menu-item-5') }}
                                <i class="fa-solid fa-angle-down nav-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">
                                {{ trans('home.menu-item-6') }}
                                <i class="fa-solid fa-angle-down nav-icon"></i>
                            </a>

                            <ul class="header-language-list animate__animated animate__fadeInDown animate__faster">
                                @foreach ($languages as $language)
                                    <li>
                                        <a
                                            href="{{ route('change-language', ['locale' => $language->locale]) }}">{{ $language->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item align-self-center ms-auto">
                            <div class="header-languages d-flex align-items-center gap-2">
                                @foreach ($languages as $language)
                                    <a class="locale-link"
                                        href="{{ route('change-language', ['locale' => $language->locale]) }}">
                                        <img class="flag-img" width="30" height="20" src="{{ $language->icon }}"
                                            alt="">
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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
