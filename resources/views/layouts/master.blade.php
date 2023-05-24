<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/home.css')}}">
        <link rel="stylesheet" href="{{asset('css/animation.css')}}">
        <link rel="stylesheet" href="{{asset('css/reponsive.css')}}">
        <link rel="stylesheet" href="{{asset('css/base.css')}}">
        <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
        <link rel="stylesheet" href="{{asset('css/header.css')}}">
        <link rel="stylesheet" href="{{asset('css/footer.css')}}">
        <link rel="stylesheet" href="{{asset('css/about-us.css')}}">
        <link rel="stylesheet" href="{{asset('css/small-slider.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <title>{{ $title }}</title>
    </head>
<body>
    @include('partials/header')

    @yield('content')

    @include('partials/footer')

    <script src="{{asset('js/bootstrap.js')}}"></script>
    @stack('scripts')
</body>
</html>