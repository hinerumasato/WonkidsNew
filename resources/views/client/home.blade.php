@extends('client.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home/bundle.css?v=') }}{{ env('STATIC_FILE_VERSION') }}">
@endsection

@section('content')
    @include('client.partials.slider')
    <div class="container mt-5">

        {{-- <div id="preloader">
            <img src="{{ asset('imgs/preloader/preloader.gif') }}" alt="Preloader">
        </div> --}}
        
        <div class="home_content row justify-content-between mt-5">
            <div class="col-xl-5 col-lg-4">
                <img class="w-100 h-100" src="{{ asset('imgs/logo/logo.png') }}" alt="">
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

            <div class="zone-list">
                <section id="zoneCarousel" class="splide" aria-label="Beautiful Zone">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($zones as $zone)
                                <li class="splide__slide">
                                    <div class="shadow zone-item">
                                        <a class="zone-item-link" href="{{route('posts.index')}}?category={{$zone->id}}">
                                            <div class="zone-item-img" style="background-image: url('{{$zone->img}}')"></div>
                                            <div class="zone-item-info">
                                                <h2 class="fs-5 text-uppercase">{{ $zone->name }}</h2>
                                                <div class="zone-item-actions">
                                                    <div class="d-block d-md-flex align-items-center justify-content-between">
                                                        <div class="zone-item-post-amounts">
                                                            <i class="fa-solid fa-list"></i>
                                                            <span>{{$postsNumArray[$zone->id]}} @lang('general.posts')</span>
                                                        </div>
                                                        <a href="{{route('posts.index')}}?category={{$zone->id}}" class="zone-item-view-btn">Xem thêm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="home-media-contents-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-12">
                    <h5 class="fw-bold text-uppercase">@lang('general.media')</h5>

                    {{-- <p class="mt-3 pe-5">
                        @lang('home.media.description')
                    </p> --}}

                    <a href="{{ route('home.media.index') }}" class="text-uppercase media-all-link fw-bold my-3">
                        <span class="me-2">@lang('general.see-all')</span>
                        <i class="fa-solid fa-right-long"></i>
                    </a>
                </div>

                <div class="col-xl-9 col-lg-12 wrapper d-flex justify-content-between media-list">
                    <div class="wonkids-song media-item">
                        <i class="fa-brands fa-itunes-note"></i>
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
                        <i class="fa-solid fa-book"></i>
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
                        <i class="fa-solid fa-scissors"></i>
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
                        <i class="fa-solid fa-bookmark"></i>
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

    <div class="container mt-5">
        <div class="video-container">
            <div class="row align-items-center">
                <div class="col-lg-4 vertical-align-center d-none d-lg-block">
                    <hr>
                </div>
                <div class="col-lg-4">
                    <h1 class="fw-bold fs-2 text-uppercase text-center">@lang('general.video-clip')</h1>
                </div>
                <div class="col-lg-4 d-none d-lg-block">
                    <hr>
                </div>
            </div>

            <div class="row row-cols-md-2 row-cols-1 g-5">
                <div class="col">
                    <div class="shadow p-3">
                        <video class="w-100 h-100" src="{{ asset(trans('home.video.first')) }}" controls></video>
                    </div>
                </div>
                <div class="col">
                    <div class="shadow p-3">
                        <video class="w-100 h-100" src="{{ asset(trans('home.video.second')) }}" controls></video>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container contact mt-5">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-12">
                <img class="md-contact-img" src="{{ asset('imgs/contact/contact_img.png') }}" alt="">

                <a class="text-uppercase primary-btn fw-bold mt-5">
                    @lang('general.contact')
                </a>
            </div>

            <div class="col-lg-6 col-12 d-flex justify-content-center">
                <img width="250" src="{{ asset('imgs/contact/contact_img.png') }}" alt="">
            </div>
        </div>
    </div>

    <div class="popup">
        <div class="popup-inner">
            <div class="popup-icon">
                <i class="fa-regular fa-bell"></i>
            </div>
            <div class="popup-title">@lang('general.popup.notification')</div>
            <div class="popup-content">
                <p>@lang('general.download-popup')</p>
            </div>
            <div class="popup-button-group">
                <button class="popup-ok-button">OK</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/home.js?v=') }}{{ env('STATIC_FILE_VERSION') }}"></script>
    <script src="{{ asset('js/carouse.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
@endsection
