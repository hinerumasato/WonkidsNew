<nav class="mobile-nav navbar navbar-expand-xl bg-body-white d-xl-none d-flex">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img class="py-2 px-3" src="{{ asset('imgs/logo/logo.png') }}" alt="" width="175" height="82">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a href="{{ route('home.media.index') }}">{{ trans('home.media-content') }}</a>
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

                    <ul class="header-language-list animate__animated animate__fadeInDown animate__faster">
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
                        {{ trans('home.menu-item-5') }}
                        <i class="fa-solid fa-angle-right nav-icon"></i>
                    </a>
                    <ul class="header-language-list animate__animated animate__fadeInDown animate__faster">
                        <li>
                            <a href="https://www.facebook.com/profile.php?id=100066749546942&mibextid=2JQ9oc"
                                class="header_sublink">
                                Facebook
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <button type="button" id="headerLanguageSelect" data-bs-toggle="modal"
                        data-bs-target="#languageModalMobile">
                        <img src="{{ $currentLanguage->icon }}" alt="Vietnam Flag">
                        <span>{{$currentLanguage->name}}</span>
                        <i class="fa-solid fa-angle-down"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="languageModalMobile" tabindex="-1" aria-labelledby="languageModalMobile"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title fs-5" id="exampleModalLabel">@lang('general.select-your-language')</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @foreach ($languages as $language)
                                        @if ($currentLanguage->locale == $language->locale)
                                            <div class="header-language-modal-link active">
                                                <div class="d-flex gap-2">
                                                    <img src="{{ $language->icon }}"
                                                        alt="{{ $language->name }} flag">
                                                    <span>{{ $language->name }}</span>
                                                </div>
                                            </div>
                                        @else
                                            <a class="header-language-modal-link"
                                                href="{{ route('change-language', ['locale' => $language->locale]) }}">
                                                <div class="d-flex gap-2">
                                                    <img src="{{ $language->icon }}"
                                                        alt="{{ $language->name }} flag">
                                                    <span>{{ $language->name }}</span>
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item align-self-center ms-auto auth-header"></li>
            </ul>
        </div>
    </div>
</nav>
