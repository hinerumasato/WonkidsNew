@extends('client.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
@endsection

@section('content')
    @include('client.partials.slider')

    {{-- <div id="preloader" class="">
        <img src="{{asset('imgs/preloader/preloader.gif')}}" alt="">
    </div> --}}

    <div class="container mt-5">
        <div class="home_content row justify-content-between">
            <div class="col-xl-5 col-lg-4">
                <img class="w-100 h-100" src="{{ asset('imgs/banners/about_banner.png') }}" alt="">
            </div>
            <div class="col-xl-6 col-lg-7 home_about_content">
                <h2 class="fw-bold text-uppercase">@lang('home.about-title')</h2>
                <p class="mt-3">
                    @lang('home.about-content')
                </p>
                <a class="mt-3 text-uppercase" href="{{ route('home.about-us') }}">@lang('general.read-more')</a>
            </div>
        </div>

        <div class="home_content zones">
            <div class="row align-items-center">
                <div class="col-lg-5 vertical-align-center d-none d-lg-block">
                    <hr>
                </div>
                <div class="col-lg-2">
                    <h1 class="fw-bold fs-2 text-uppercase text-center">@lang('general.11zones')</h1>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <hr>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-1 d-md-flex d-none col-0 prev-btn">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>

                <div class="col-md-10 col-12 zones-wrapper" item="xl-3 lg-2 md-2 sm-1">
                    <ul class="zones-list m-0">
                        @foreach ($zones as $key => $zone)
                            <li class="zones-item shadow p-4">
                                <img width="150" height="150" src="{{ $zone['img'] }}" alt="">
                                <h5 class="mt-3 fw-bold text-uppercase">{{ $zonesNames[$key] }}</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry ...</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="zones-item-amount">
                                        <i class="fa-solid fa-list"></i>
                                        <span>{{ $zonesAmounts[$key] }} @lang('general.posts')</span>
                                    </div>

                                    <a href="{{ route('posts.index', ['category' => $zone['id']]) }}"
                                        class="zones-item-link text-lowercase">@lang('general.see-more')</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-1 d-md-flex d-none col-0 next-btn">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="home-media-contents-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-12">
                    <h5 class="fw-bold text-uppercase">@lang('general.media')</h5>

                    <p class="mt-3 pe-5">
                        @lang('home.media.description')
                    </p>

                    <a href="{{ route('home.media.index') }}" class="text-uppercase media-all-link fw-bold my-3">
                        <span class="me-2">@lang('general.see-all')</span>
                        <i class="fa-solid fa-right-long"></i>
                    </a>
                </div>

                <div class="col-xl-9 col-lg-12 wrapper d-flex justify-content-between media-list">
                    <div class="wonkids-song media-item">
                        <img class="w-100" src="{{ asset('imgs/medias/song.png') }}" alt="">
                        <div class="media-item-content">
                            <h6 class="fw-bold text-center">@lang('home.wonkids-song')</h6>
                            <p>
                                @lang('home.wonkids-song-description')
                            </p>

                            <a href="{{ route('home.media.index-slug', ['mediaSlug' => $wonkidsSong['slug']]) }}"
                                class="media-item-content-link">@lang('general.view-details')</a>
                        </div>
                    </div>
                    <div class="wonkids-story media-item">
                        <img class="w-100" src="{{ asset('imgs/medias/story.png') }}" alt="">
                        <div class="media-item-content">
                            <h6 class="fw-bold text-center">@lang('home.wonkids-story')</h6>
                            <p>
                                @lang('home.wonkids-story-description')
                            </p>

                            <a href="{{ route('home.media.index-slug', ['mediaSlug' => $wonkidsStory['slug']]) }}"
                                class="media-item-content-link">@lang('general.view-details')</a>
                        </div>
                    </div>
                    <div class="wonkids-craft media-item">
                        <img class="w-100" src="{{ asset('imgs/medias/craft.png') }}" alt="">
                        <div class="media-item-content">
                            <h6 class="fw-bold text-center">@lang('home.wonkids-activities')</h6>
                            <p>
                                @lang('home.wonkids-activities-description')
                            </p>

                            <a href="{{ route('home.media.index-slug', ['mediaSlug' => $wonkidsCraft['slug']]) }}"
                                class="media-item-content-link">@lang('general.view-details')</a>
                        </div>
                    </div>
                    <div class="wonkids-bible media-item">
                        <img class="w-100" src="{{ asset('imgs/medias/bible.png') }}" alt="">
                        <div class="media-item-content">
                            <h6 class="fw-bold text-center">@lang('home.wonkids-bible')</h6>
                            <p>
                                @lang('home.wonkids-bible-description')
                            </p>

                            <a href="{{ route('home.media.index-slug', ['mediaSlug' => $wonkidsMemorize['slug']]) }}"
                                class="media-item-content-link">@lang('general.view-details')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container contact mt-5">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-12">
                <h2 class="fw-bold text-uppercase">
                    @lang('home.contact.title')
                </h2>

                <img class="md-contact-img" src="{{ asset('imgs/contact/contact_img.png') }}" alt="">

                <a class="text-uppercase primary-btn fw-bold mt-5">
                    @lang('general.contact')
                </a>
            </div>

            <div class="col-lg-6 col-12 d-flex justify-content-center">
                <img class="w-100" src="{{ asset('imgs/contact/contact_img.png') }}" alt="">
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/carouse.js') }}"></script>
@endsection
