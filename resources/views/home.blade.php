<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/reponsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/base.css')}}">
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Document</title>
</head>
<body>
    @include('partials.header')
    <main>
        <div class="slider">
            <img src="{{asset('imgs/sliders/slider1.jpg')}}" alt="" class="slider_img">
            <div class="slider_float_in">
                <img src="{{asset('imgs/sliders/wonkidsclub_logo_slider.png')}}" alt="" class="slider_logo_img">
                <p class="slider_float_in_content">{{ trans('home.slider-content') }}</p>
            </div>
        </div>

        <div class="grid container">
            <div class="about container_content">
                <h2 class="about_title container_content_title">{{ trans('home.about-title') }}</h2>
                <p class="about_content">{{ trans('home.about-content') }}</p>
                <button class="about_read_btn">Đọc thêm</button>
                <div class="container_icon">
                    <span class="with_icon"></span>
                    <span class="diamond_icon"></span>
                    <span class="with_icon"></span>
                </div>
            </div>

            <div class="container_content">
                <h2 class="container_content_title">{{ trans('home.small-nav-title') }}</h2>
                <ul class="wonkids_club_list container_list">
                    <li class="container_item">
                        <a href="#" class="container_link">
                            <i class="fa-solid fa-user-group container_list_icon"></i>
                            <p>{{ trans('home.operating-instructions') }}</p>
                        </a>
                    </li>
                    <li class="container_item">
                        <a href="#" class="container_link">
                            <i class="fa-solid fa-book container_list_icon"></i>
                            <p>{{ trans('home.11-period') }}</p>
                        </a>
                    </li>
                    <li class="container_item">
                        <a href="#" class="container_link">
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

            <div class="container_content">
                <h2 class="container_content_title">{{ trans('home.media-content') }}</h2>
                <ul class="container_list media_list">
                    <li class="container_item">
                        <a href="#" class="container_link">
                            <i class="fa-solid fa-music container_list_icon"></i>
                            <p class="container_content_item_title">{{ trans('home.wonkids-song') }}</p>
                            <div class="media_description">
                                {{ trans('home.wonkids-song-description') }}
                            </div>
                        </a>
                    </li>
                    <li class="container_item">
                        <a href="#" class="container_link">
                            <i class="fa-solid fa-book container_list_icon"></i>
                            <p class="container_content_item_title">{{ trans('home.wonkids-story') }}</p>
                            <div class="media_description">
                                {{ trans('home.wonkids-story-description') }}
                            </div>
                        </a>
                    </li>
                    <li class="container_item">
                        <a href="#" class="container_link">
                            <i class="fa-solid fa-scissors container_list_icon"></i>
                            <p class="container_content_item_title">{{ trans('home.wonkids-activities') }}</p>
                            <div class="media_description">
                                {{ trans('home.wonkids-activities-description') }}
                            </div>
                        </a>
                    </li>
                    <li class="container_item">
                        <a href="#" class="container_link">
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

            <div class="container_content">
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

            <div class="container_content contact_content">
                <h2 class="container_content_title">Hỏi đáp</h2>
                <form action="">
                    <div class="container_form_up">
                        <input type="text" name="name" id="name" placeholder="Name*">
                        <input type="email" name="email" id="email" placeholder="Email*">
                        <input type="text" name="tel" id="tel" placeholder="Tel">
                    </div>
                    <textarea class="container_text_area" name="message" id="message" placeholder="Message*"></textarea>
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

    @include('partials.footer')
    <script src="{{ asset('js/header.js') }}"></script>
</body>
</html>