<nav class="side-nav">
    <div class="side-nav-header bg-light d-flex align-items-center">
        <div class="px-3 d-flex w-100 justify-content-between">
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

            <button class="close-side-nav-btn">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    </div>

    <div class="side-nav-content">
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
                    <li class="side-nav-subitem"><a href="{{ route('home.about-us') }}"
                            class="side-nav-sublink">Khái
                            quát</a></li>
                    <li class="side-nav-subitem"><a href="{{ route('home.operation') }}"
                            class="side-nav-sublink">Điều
                            hành</a></li>
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
                            <a href="{{ route('posts.index') }}" class="side-nav-sublink d-flex">11 Thời Kỳ</a>
                            <button class="side-nav-submenu-open-btn">
                                <i class="fa-solid fa-plus side-nav-icon"></i>
                            </button>
                        </span>
                        {!! $sideNav !!}
                    </li>
                    <li class="side-nav-subitem"><a href="{{ route('home.operation') }}"
                            class="side-nav-sublink">Nội dung truyền thông</a></li>
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
                            class="side-nav-sublink">Wonderful Story Book</a></li>
                    <li class="side-nav-subitem"><a href="{{ route('home.camp') }}"
                            class="side-nav-sublink">Wonderful Story Camp</a></li>
                    <li class="side-nav-subitem"><a href="{{ route('home.wonkidsclub') }}"
                            class="side-nav-sublink">Wonkids Club</a></li>
                </ul>
            </li>

            <li class="side-nav-item">
                <div class="d-flex justify-content-between">
                    <a href="#" class="side-nav-link">
                        {{ trans('home.menu-item-5') }}
                    </a>
                    <button class="side-nav-submenu-open-btn">
                        <i class="fa-solid fa-plus side-nav-icon"></i>
                    </button>
                </div>
                <ul class="side-nav-submenu">
                    <li class="side-nav-subitem"><a href="{{ route('home.about-us') }}"
                            class="side-nav-sublink">Khái
                            quát</a></li>
                    <li class="side-nav-subitem"><a href="{{ route('home.operation') }}"
                            class="side-nav-sublink">Điều
                            hành</a></li>
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
                    <li class="side-nav-subitem"><a href="{{ route('home.about-us') }}"
                            class="side-nav-sublink">Khái
                            quát</a></li>
                    <li class="side-nav-subitem"><a href="{{ route('home.operation') }}"
                            class="side-nav-sublink">Điều
                            hành</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>