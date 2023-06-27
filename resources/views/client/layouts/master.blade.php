<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="shortcut icon" href="{{asset('imgs/icon/favicon.ico')}}">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/home.css')}}">
        <link rel="stylesheet" href="{{asset('css/animation.css')}}">
        <link rel="stylesheet" href="{{asset('css/base.css')}}">
        {{-- <link rel="stylesheet" href="{{asset('css/normalize.css')}}"> --}}
        <link rel="stylesheet" href="{{asset('css/header.css')}}">
        <link rel="stylesheet" href="{{asset('css/footer.css')}}">
        <link rel="stylesheet" href="{{asset('css/about-us.css')}}">
        <link rel="stylesheet" href="{{asset('css/small-slider.css')}}">
        <link rel="stylesheet" href="{{asset('css/small-nav.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        @yield('css')
        @stack('css')
        <title>{{ $title }}</title>
    </head>
<body>
    @include('client.partials.header')

    @yield('content')

    @include('client.partials.footer')

    <script src="{{asset('js/bootstrap.js')}}"></script>
    @yield('scripts')
    @stack('scripts')
</body>
</html>