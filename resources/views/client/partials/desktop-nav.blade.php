<nav class="desktop-nav navbar navbar-expand-xl bg-body-white d-xl-flex d-none">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img class="py-2 px-3" src="{{ asset('imgs/logo/logo.png') }}" alt="" width="175" height="82">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="w-100 navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
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
                            <a href="{{ route('home.media.index') }}"
                                class="header_sublink">{{ trans('home.media-content') }}</a>
                            <ul class="menu_submenu">
                                @foreach ($medias as $media)
                                    <li class="menu_subitem">
                                        <a href="{{ route('home.media.index-slug', ['mediaSlug' => $media['slug']]) }}"
                                            class="menu_sublink">{{ $media['name'] }}</a>
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

                    <ul
                        class="header_submenu header-language-list animate__animated animate__fadeInDown animate__faster">
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
                    <ul class="animate__animated animate__fadeInDown animate__faster">
                        <li>
                            <a href="https://www.facebook.com/profile.php?id=100066749546942&mibextid=2JQ9oc"
                                class="header_sublink">
                                Facebook
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- <li class="nav-item align-self-center ms-auto">
                    <div class="header-languages d-flex align-items-center gap-2">
                        @foreach ($languages as $language)
                            <a class="locale-link"
                                href="{{ route('change-language', ['locale' => $language->locale]) }}">
                                <img class="flag-img" width="30" height="20" src="{{ $language->icon }}"
                                    alt="">
                            </a>
                        @endforeach
                    </div>
                </li> --}}



                <li class="nav-item align-self-center ms-auto auth-header"></li>
                <li class="nav-item mx-2">
                    <button type="button" id="headerLanguageSelect" class="ms-auto" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <img src="{{ $currentLanguage->icon }}" alt="Vietnam Flag">
                        <i class="fa-solid fa-angle-down"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('general.select-your-language')</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row row-cols-2">
                                        @foreach ($languages as $language)    
                                            <div class="col mt-3">
                                                @if ($currentLanguage->locale == $language->locale)
                                                <div class="header-language-modal-link active">
                                                    <div class="d-flex gap-2">
                                                        <img src="{{$language->icon}}" alt="{{$language->name}} flag">
                                                        <span>{{$language->name}}</span>
                                                    </div>
                                                </div>
                                                @else
                                                    <a class="header-language-modal-link" href="{{route('change-language', ['locale' => $language->locale])}}">
                                                        <div class="d-flex gap-2">
                                                            <img src="{{$language->icon}}" alt="{{$language->name}} flag">
                                                            <span>{{$language->name}}</span>
                                                        </div>
                                                    </a>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
