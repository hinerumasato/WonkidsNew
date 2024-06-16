<header class="shadow bg-white">
    <div class="header-info">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="wrapper d-flex gap-3 w-100 justify-content-between justify-content-md-start">
                <div class="header-info-email">
                    <i class="fa-solid fa-envelope"></i>
                    <span>wonkidsclub20@gmail.com</span>
                </div>
                <div class="header-info-phone">
                    <i class="fa-solid fa-phone"></i>
                    <span>0707717745</span>
                </div>
            </div>

            <div class="header-info-follow d-md-flex d-none gap-2 align-items-center">
                <span>Follow:</span>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-google"></i>
                <i class="fa-brands fa-youtube"></i>
            </div>
        </div>
    </div>

    <div class="header-nav container">
        
        @include('client.partials.desktop-nav')
        @include('client.partials.mobile-nav')
    </div>
</header>

@push('scripts')
    <script src="{{ asset('js/header.js') }}"></script>
    <script src="{{ asset('js/fittop.js') }}"></script>
    <script>
        fitTop('.menu_submenu', '.menu_subitem');
        fitTop('.menu_submenu', '.header_subitem');
    </script>
@endpush
