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
    <header>
        <div class="header_left">
            <img src="{{asset('imgs/logo/logo.png')}}" alt="" class="header_logo">
        </div>
        <div class="header_center">
            <ul class="header_menu_list">
                <li class="header_menu_item"><a href="#" class="header_menu_item_link">HOME</a></li>
                <li class="header_menu_item"><a href="#" class="header_menu_item_link">Wonkids Club</a></li>
                <li class="header_menu_item"><a href="#" class="header_menu_item_link">Nội dung Wonkids Club</a></li>
                <li class="header_menu_item"><a href="#" class="header_menu_item_link">Wonderful Story</a></li>
                <li class="header_menu_item"><a href="#" class="header_menu_item_link">Cộng Đồng (Community)</a></li>
                <li class="header_menu_item"><a href="#" class="header_menu_item_link">Ngôn ngữ (Language)</a></li>
            </ul>
        </div>
        <div class="header_right">
            <div class="header_right_languages">
                <img src="{{asset('imgs/vietnam-flag-icon-32.png')}}" alt="">
                <img src="{{asset('imgs/south-korea-flag-icon-32.png')}}" alt="">
            </div>
        </div>
    </header>

    <main>
        <div class="slider">
            <img src="{{asset('imgs/sliders/slider1.jpg')}}" alt="">
        </div>

        <div class="grid container">
            <div class="about container_content">
                <h2 class="about_title container_content_title">Wonkids Club là</h2>
                <p class="about_content">một chương trình dạy Kinh Thánh dành cho nhóm thiếu nhi bằng nội dung truyền thông(media contents).</p>
                <button class="about_read_btn">Đọc thêm</button>
                <div class="container_icon">
                    <span class="with_icon"></span>
                    <span class="diamond_icon"></span>
                    <span class="with_icon"></span>
                </div>
            </div>

            <div class="container_content">
                <h2 class="container_content_title">Wonkids Club</h2>
                <ul class="wonkids_club_list container_list">
                    <li class="container_item">
                        <a href="#" class="container_link">
                            <i class="fa-solid fa-user-group container_list_icon"></i>
                            <p>Hướng dẫn điều hành</p>
                        </a>
                    </li>
                    <li class="container_item">
                        <a href="#" class="container_link">
                            <i class="fa-solid fa-book container_list_icon"></i>
                            <p>11 Thời kỳ</p>
                        </a>
                    </li>
                    <li class="container_item">
                        <a href="#" class="container_link">
                            <i class="fa-solid fa-video container_list_icon"></i>
                            <p>Nội dung truyền thông</p>
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
                <h2 class="container_content_title">Nội dung truyền thông</h2>
                <ul class="container_list media_list">
                    <li class="container_item">
                        <a href="#" class="container_link">
                            <i class="fa-solid fa-music container_list_icon"></i>
                            <p class="container_content_item_title">Bài hát Wonkids</p>
                            <div class="media_description">
                                <p>bài hát chứa đựng chủ đề và những bài múa sôi động</p>
                                <p>(video, bản nhạc , âm nhạc, PPT lời bài hát)</p>
                            </div>
                        </a>
                    </li>
                    <li class="container_item">
                        <a href="#" class="container_link">
                            <i class="fa-solid fa-book container_list_icon"></i>
                            <p class="container_content_item_title">Câu chuyện Wonkids</p>
                            <div class="media_description">
                                <p>những câu chuyện sôi động về các nhân vật trong Kinh Thánh</p>
                                <p>(kịch rối, hoạt hình, bảng nhỉ, kịch bóng, PPT…)</p>
                            </div>
                        </a>
                    </li>
                    <li class="container_item">
                        <a href="#" class="container_link">
                            <i class="fa-solid fa-scissors container_list_icon"></i>
                            <p class="container_content_item_title">Hoạt động Wonkids</p>
                            <div class="media_description">
                                <p>Giúp các em ứng dụng bài học bằng những phương pháp đa dạng</p>
                                <p>(game, làm thủ công, tò màu…)</p>
                            </div>
                        </a>
                    </li>
                    <li class="container_item">
                        <a href="#" class="container_link">
                            <i class="fa-solid fa-bookmark container_list_icon"></i>
                            <p class="container_content_item_title">Câu gốc Wonkids</p>
                            <div class="media_description">
                                <p>Giúp các em học thuộc câu gốc chủ đề một cách thú vị và dễ dàng.</p>
                                <p>(chant, củ điệu tay, PPT...)</p>
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
                <h2 class="container_content_title">Nội dung thông báo</h2>
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

    <footer>
        <div class="grid">
            <h2 class="footer_title">Wonkids Club</h2>
            <p class="footer_description">Copyrights ©2019 WonKidsClub.net All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>