const mix = require('laravel-mix');

mix.styles([
    'resources/css/bootstrap.css',
    'resources/css/animation.css',
    'resources/css/base.css',
    'resources/css/header.css',
    'resources/css/footer.css',
    'resources/css/small-slider.css',
    'resources/css/small-nav.css',
    'resources/css/lazy.css',
    'resources/css/variable.css',
    'resources/css/preloader.css',
    'resources/css/splide-customize.css',
], 'public/css/master/bundle.css');

mix.styles([
    'resources/css/home.css',
    'resources/css/slider.css',
], 'public/css/home/bundle.css');

mix.options({
    watchOptions: {
        poll: 1000
    }
});
