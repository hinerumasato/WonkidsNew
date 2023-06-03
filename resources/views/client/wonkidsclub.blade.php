@extends('client.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/wonderful.css') }}">
@endsection

@section('content')
    @include('client.partials.small-slider')
    <div class="container">
        <h2 class="py-5 fs-1 fw-bold">Wonkids Club</h2>
        <img src="{{asset('imgs/wonkidsclub/wonkidsclub_title.jpg')}}" alt="" class="w-100">
        <p class="fs-6 lh-base">
            Wonkids Club là một chương trình dạy Kinh Thánh truyền thông dành cho thiếu nhi, kể nhiều câu chuyện Kinh Thánh theo từng thời kì và giúp các em học kinh thánh một cách thú vị bằng nhiều hoạt động khác nhau như : kể chuyện kinh thánh, múa ngợi khen, hoạt động, học thuộc lòng câu gốc một cách thú vị. <br>
            Wonkids Club là chương trình dạy Kinh Thánh dành cho thiếu nhi phù hợp với thời đại  công nghệ thông tin,  bên cạnh đó cũng giúp phụ huynh và giáo viên trường Chúa nhật dễ dàng hơn trong việc dạy Kinh Thánh cho trẻ theo từng tuần. Chúng tôi cũng dự định sẽ mở rộng mạng lưới giảng dạy theo đơn vị khu vực, hệ phái và quốc gia.
        </p>

        <ul>
            <h2 class="py-5 fs-1 fw-bold">Lịch sử</h2>
            <li class="d-flex mb-3">
                <p class="wonderful-year">2016</p>
                <p>Thành lập nhóm Wonkids Club (gồm 6 giáo sĩ Hàn Quốc tại Việt Nam tham dự)</p>
            </li>
            <li class="d-flex mb-3">
                <p class="wonderful-year">2017</p>
                <p>Chuẩn bị bản kế hoạch của Wonkids Club và bắt đầu chế tác nội dung phần Cựu ước</p>
            </li>
            <li class="d-flex mb-3">
                <p class="wonderful-year">2019</p>
                <div class="wrap">
                    <p>4/2019: Chuẩn bị bản kế hoạch trang web của Wonkids Club</p>
                    <p>9/2019: Xây dựng trang web của Wonkids Club</p>
                </div>
            </li>
        </ul>
    </div>
@endsection