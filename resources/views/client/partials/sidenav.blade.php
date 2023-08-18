<nav class="side-nav offcanvas offcanvas-start" tabindex="-1" id="sidenavOffcanvas">
    <div class="side-nav-header offcanvas-header bg-light d-flex align-items-center">
        <div class="d-flex w-100 justify-content-between">
            <div class="language d-flex align-items-center">
                <a class="locale-link" href="{{ route('change-language', ['locale' => 'vi']) }}"><img
                        class="flag-img" src="{{ asset('imgs/flags/vietnam-flag-icon-32.png') }}"
                        alt=""></a>
                <a class="locale-link" href="{{ route('change-language', ['locale' => 'ko']) }}"><img
                        class="flag-img" src="{{ asset('imgs/flags/south-korea-flag-icon-32.png') }}"
                        alt=""></a>
                <a class="locale-link" href="{{ route('change-language', ['locale' => 'en']) }}"><img
                        class="flag-img" src="{{ asset('imgs/flags/uk-flag-icon-32.png') }}" alt=""></a>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
    </div>

    <div class="side-nav-content offcanvas-body">
        <ul class="side-nav-list">
            <li class="side-nav-item d-flex justify-content-between"><a href="{{ route('home.index') }}"
                    class="side-nav-link">{{ trans('home.menu-item-1') }}</a></li>
            <li class="side-nav-item">
                <div class="d-flex justify-content-between">
                    <a href="#" class="side-nav-link">
                        {{ trans('home.menu-item-2') }}
                    </a>
                    <button class="side-nav-submenu-open-btn">
                        <i class="fa-solid fa-plus side-nav-icon"></i>
                    </button>
                </div>
                <ul class="side-nav-submenu">
                    <li class="side-nav-subitem">
                        <a href="{{ route('home.about-us') }}" class="side-nav-sublink">
                            @lang('general.introduction')
                        </a>
                    </li>
                    <li class="side-nav-subitem">
                        <a href="{{ route('home.operation') }}" class="side-nav-sublink">
                            @lang('general.operation')
                        </a>
                    </li>
                </ul>
            </li>

            <li class="side-nav-item">
                <div class="d-flex justify-content-between">
                    <a href="#" class="side-nav-link">
                        {{ trans('home.menu-item-3') }}
                    </a>
                    <button class="side-nav-submenu-open-btn">
                        <i class="fa-solid fa-plus side-nav-icon"></i>
                    </button>
                </div>
                <ul class="side-nav-submenu">
                    <li class="side-nav-subitem">
                        <span class="d-flex justify-content-between">
                            <a href="{{ route('posts.index') }}" class="side-nav-sublink d-flex">@lang('general.11zones')</a>
                            <button class="side-nav-submenu-open-btn">
                                <i class="fa-solid fa-plus side-nav-icon"></i>
                            </button>
                        </span>
                        {!! $sideNav !!}
                    </li>
                    <li class="side-nav-subitem">
                        <span class="d-flex justify-content-between">
                            <a href="{{ route('home.media.index') }}" class="side-nav-sublink">{{ trans('general.media') }}</a>
                            <button class="side-nav-submenu-open-btn">
                                <i class="fa-solid fa-plus side-nav-icon"></i>
                            </button>
                        </span>

                        <ul class="side-nav-submenu">
                            @foreach ($medias as $media)
                                <li class="side-nav-subitem">
                                    <a href="{{route('home.media.index-slug', ['mediaSlug' => $media['slug']])}}" class="side-nav-sublink">{{ $media['name'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="side-nav-item">
                <div class="d-flex justify-content-between">
                    <a href="#" class="side-nav-link">
                        {{ trans('home.menu-item-4') }}
                    </a>
                    <button class="side-nav-submenu-open-btn">
                        <i class="fa-solid fa-plus side-nav-icon"></i>
                    </button>
                </div>
                <ul class="side-nav-submenu">
                    <li class="side-nav-subitem"><a href="{{ route('home.book') }}"
                            class="side-nav-sublink">@lang('general.book')</a></li>
                    <li class="side-nav-subitem"><a href="{{ route('home.camp') }}"
                            class="side-nav-sublink">@lang('general.camp')</a></li>
                    <li class="side-nav-subitem"><a href="{{ route('home.wonkidsclub') }}"
                            class="side-nav-sublink">@lang('general.club')</a></li>
                </ul>
            </li>
            
            <li class="side-nav-item">
                <div class="d-flex justify-content-between">
                    <a href="#" class="side-nav-link">
                        {{ trans('home.menu-item-6') }}
                    </a>
                    <button class="side-nav-submenu-open-btn">
                        <i class="fa-solid fa-plus side-nav-icon"></i>
                    </button>
                </div>
                <ul class="side-nav-submenu">
                    @foreach ($languages as $language)
                        <li class="side-nav-subitem">
                            <a href="{{ route('change-language', ['locale' => $language->locale]) }}" class="side-nav-sublink">
                                {{ $language->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="side-nav-item">
                <div class="d-flex justify-content-between">
                    <a href="#" class="side-nav-link">
                        {{ trans('home.menu-item-5') }}
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>

@push('scripts')
    <script>
        function displaySubMenu() {
            const openSubMenuBtns = document.querySelectorAll('.side-nav-submenu-open-btn');
            
            openSubMenuBtns.forEach((btn, index) => {
                btn.onclick = () => {
                    const parent = btn.parentNode.parentNode;
                    const subMenu = parent.querySelector('.side-nav-submenu')
                    const computedHeight = subMenu.scrollHeight;
                    const icon = btn.querySelector('i');

                    if(!btn.classList.contains('open')) {
                        // subMenu.style.height = `${computedHeight}px`;
                        subMenu.style.display = `block`;
                        subMenu.classList.add('animate__animated', 'animate__fadeInDown', 'animate__faster');
                        subMenu.style.marginTop = `${20}px`;
                        btn.classList.add('open');
                        icon.classList.remove('fa-plus');
                        icon.classList.add('fa-minus');
                    }
                    else {
                        subMenu.classList.remove('animate__animated', 'animate__fadeInDown', 'animate__faster');
                        subMenu.style.display = `none`;
                        subMenu.style.marginTop = `0`;
                        btn.classList.remove('open');
                        icon.classList.add('fa-plus');
                        icon.classList.remove('fa-minus');
                    }
                }
            });

        }

        displaySubMenu();

    </script>
@endpush