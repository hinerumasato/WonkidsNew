@extends('client.layouts.master')
@section('content')


<main>
    <div id="preloader" class="">
        <img src="{{asset('imgs/preloader/preloader.gif')}}" alt="">
    </div>
    @include('client.partials.slider')  
    <div class="container">
        <div class="about container_content" lazy-element>
            <h2 class="about_title container_content_title">{{ trans('home.about-title') }}</h2>
            <p class="about_content">{{ trans('home.about-content') }}</p>
            <button class="about_read_btn">
                <a class="about_read_link" href="{{route('home.about-us')}}">{{ trans('home.learn-more') }}</a>
            </button>
            <div class="container_icon">
                <span class="with_icon"></span>
                <span class="diamond_icon"></span>
                <span class="with_icon"></span>
            </div>
        </div>

        <div class="wonkids_club_is container_content" lazy-element>
            <h2 class="container_content_title">{{ trans('home.small-nav-title') }}</h2>
            <ul class="wonkids_club_list container_list row gap-3">
                <li class="container_item col-lg col-12">
                    <a href="{{route('home.operation')}}" class="container_link">
                        <i class="fa-solid fa-user-group container_list_icon"></i>
                        <p>{{ trans('home.operating-instructions') }}</p>
                    </a>
                </li>
                <li class="container_item col-lg col-12">
                    <a href="{{route('posts.index')}}" class="container_link">
                        <i class="fa-solid fa-book container_list_icon"></i>
                        <p>{{ trans('home.11-period') }}</p>
                    </a>
                </li>
                <li class="container_item col-lg col-12">
                    <a href="{{route('home.media.index')}}" class="container_link">
                        <i class="fa-solid fa-video container_list_icon"></i>
                        <p>{{ trans('home.media-content') }}</p>
                    </a>
                </li>
            </ul>
            <div class="container_icon">
                <span class="with_icon"></span>
                <span class="diamond_icon"></span>
                <span class="with_icon"></span>
            </div>
        </div>
    </div>

    <div class="home_container_video" lazy-element>
        <iframe class="container_iframe" width="60%" height="76%" src="https://www.youtube.com/embed/MMDRukV6Kbg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>

    <div class="container">
        <div class="container_content" lazy-element>
            <h2 class="container_content_title">{{ trans('home.media-content') }}</h2>
            <ul class="container_list row justify-content-between media_list">
                <li class="container_item col-lg-6 col-12">
                    <a href="{{route('home.media.index-slug', ['mediaSlug' => $wonkidsSong['slug']])}}" class="container_link">
                        <i class="fa-solid fa-music container_list_icon"></i>
                        <p class="container_content_item_title">{{ trans('home.wonkids-song') }}</p>
                        <div class="media_description">
                            {{ trans('home.wonkids-song-description') }}
                        </div>
                    </a>
                </li>
                <li class="container_item col-lg-6 col-12">
                    <a href="{{route('home.media.index-slug', ['mediaSlug' => $wonkidsStory['slug']])}}" class="container_link">
                        <i class="fa-solid fa-book container_list_icon"></i>
                        <p class="container_content_item_title">{{ trans('home.wonkids-story') }}</p>
                        <div class="media_description">
                            {{ trans('home.wonkids-story-description') }}
                        </div>
                    </a>
                </li>
                <li class="container_item col-lg-6 col-12">
                    <a href="{{route('home.media.index-slug', ['mediaSlug' => $wonkidsCraft['slug']])}}" class="container_link">
                        <i class="fa-solid fa-scissors container_list_icon"></i>
                        <p class="container_content_item_title">{{ trans('home.wonkids-activities') }}</p>
                        <div class="media_description">
                            {{ trans('home.wonkids-activities-description') }}
                        </div>
                    </a>
                </li>
                <li class="container_item col-lg-6 col-12">
                    <a href="{{route('home.media.index-slug', ['mediaSlug' => $wonkidsMemorize['slug']])}}" class="container_link">
                        <i class="fa-solid fa-bookmark container_list_icon"></i>
                        <p class="container_content_item_title">{{ trans('home.wonkids-bible') }}</p>
                        <div class="media_description">
                            {{ trans('home.wonkids-bible-description') }}
                        </div>
                    </a>
                </li>
            </ul>
            <div class="container_icon">
                <span class="with_icon"></span>
                <span class="diamond_icon"></span>
                <span class="with_icon"></span>
            </div>
        </div>

        <div class="container_content" lazy-element>
            <h2 class="container_content_title">{{ trans('home.notification-content') }}</h2>
            <a class="notification_link" href="#">
                <img src="{{asset('imgs/notifications/notification1.jpg')}}" alt="" class="notification_img">
                <p class="notification_description">Tôi đang xây dựng một trang web</p>
            </a>
            <div class="container_icon">
                <span class="with_icon"></span>
                <span class="diamond_icon"></span>
                <span class="with_icon"></span>
            </div>
        </div>

        <div id="qa" class="container_content contact_content" lazy-element>
            @if (session('msg'))
                <div class="alert alert-success">
                    {{ session('msg') }}
                </div>
            @endif
            <h2 class="container_content_title">Hỏi đáp</h2>
            <form action="" method="POST">
                @csrf
                <div class="container_form_up">
                    <input type="text" name="name" id="name" placeholder="{{trans('general.name')}}*">
                    <input type="email" name="email" id="email" placeholder="Email*">
                    <input type="text" name="phone" id="tel" placeholder="{{trans('general.tel')}}">
                </div>
                <input type="text" name="title" id="" placeholder="{{trans('general.title')}}" class="title_input">
                <textarea class="container_text_area" name="message" id="message" placeholder="{{trans('general.message')}}*"></textarea>
                <div class="container_button_wrap">
                    <button class="container_submit_btn" type="submit">
                        <i class="fa-solid fa-share"></i>
                        SEND
                    </button>
                </div>
            </form>
        </div>
    </div>

</main>
@endsection

@section('scripts')
    <script>
        let msg = @json(session('msg'));
        if(msg != null) {
            window.location.replace(@json(route('home.index')) + '#qa');
        }
    </script>

    <script>
        const containerItems = document.querySelectorAll('.container_item');
        containerItems.forEach(item => {
            const link = item.querySelector('a');
            item.onclick = () => {
                link.click();
            }
        });
    </script>

    <script src="{{asset('js/header.js')}}"></script>
@endsection
