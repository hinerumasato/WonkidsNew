<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('imgs/icon/favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/master/bundle.css?v=') }}{{ env('STATIC_FILE_VERSION') }}">
    
    {{-- CDNS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    @yield('css')
    @stack('css')

    {{-- Google Analyst --}}
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9GNB73DHJV"></script>
    <title>{{ $title }}</title>
</head>

<body>
    {{-- Cookies Consents Form --}}
    <div id="cookieConsentForm">
        <p>
            <strong>@lang('general.do-you-like-cookies')</strong> 
            <img src="{{asset('imgs/icon/cookies.png')}}" alt="Cookies Image" width="16px" height="16px">
            <span>@lang('general.cookies-description')</span>
        </p>
        <div class="button-wrapper">
            <button id="cancelCookieBtn">@lang('general.cancel')</button>
            <button id="acceptCookieBtn">@lang('general.accept-cookies')</button>
        </div>
    </div>

    <div id="loadingOverlay">
        <div class="spinner-border text-white" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    @include('client.partials.header')

    @yield('content')

    @include('client.partials.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script src="{{ asset('js/google-analytics.js') }}?v={{env('STATIC_FILE_VERSION')}}"></script>

    <script src="{{ asset('js/language/language.js') }}"></script>
    <script src="{{ asset('js/placeholder.js') }}"></script>
    <script src="{{ asset('js/lazy.js') }}"></script>
    <script src="{{ asset('js/util.js') }}"></script>
    <script type="module" src="{{ asset('js/Toast.js') }}"></script>
    @yield('scripts')
    @stack('scripts')
</body>

</html>
