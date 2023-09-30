<nav class="mobile-nav navbar navbar-expand-xl bg-body-white d-xl-none d-flex">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img class="py-2 px-3" src="{{ asset('imgs/logo/logo.png') }}" alt="" width="175"
                height="82">
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
                    <a class="nav-link open-btn" aria-current="page" href="#">
                        {{ trans('home.menu-item-2') }}
                        <i class="fa-solid fa-angle-right nav-icon"></i>
                    </a>

                    <ul class="animate__animated animate__fadeInDown animate__faster">
                        <li>
                            <a href="{{ route('home.about-us') }}">
                                @lang('general.about-us')
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home.management') }}">
                                @lang('general.management')
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link open-btn" aria-current="page" href="#">
                        {{ trans('home.menu-item-3') }}
                        <i class="fa-solid fa-angle-right nav-icon"></i>
                    </a>

                    <ul class="animate__animated animate__fadeInDown animate__faster">
                        <li class="nav-item">
                            <a href="{{ route('posts.index') }}">
                                {{ trans('home.11-period') }}
                            </a>

                            {!! $subMobileCategoriesList !!}
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('home.media.index') }}"
                            >{{ trans('home.media-content') }}</a>
                            <ul>
                                @foreach ($medias as $media)
                                    <li class="nav-item">
                                        <a href="{{ route('home.media.index-slug', ['mediaSlug' => $media['slug']]) }}"
                                            class="menu_sublink">{{ $media['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link open-btn" aria-current="page" href="#">
                        {{ trans('home.menu-item-4') }}
                        <i class="fa-solid fa-angle-right nav-icon"></i>
                    </a>

                    <ul
                        class="header-language-list animate__animated animate__fadeInDown animate__faster">
                        <li class="nav-item">
                            <a href="{{ route('home.book') }}">
                                @lang('general.book')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home.camp') }}">
                                @lang('general.camp')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home.wonkidsclub') }}">
                                @lang('general.club')
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link open-btn" aria-current="page" href="#">
                        {{ trans('home.menu-item-6') }}
                        <i class="fa-solid fa-angle-right nav-icon"></i>
                    </a>
                    
                    <ul class="header-language-list animate__animated animate__fadeInDown animate__faster">
                        @foreach ($languages as $language)
                        <li class="nav-item">
                            <a
                            href="{{ route('change-language', ['locale' => $language->locale]) }}">{{ $language->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link open-btn" aria-current="page" href="#">
                        {{ trans('home.menu-item-5') }}
                    </a>
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