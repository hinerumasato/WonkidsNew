@extends('client.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/wonderful.css') }}">
@endsection
@section('content')
    @include('client.partials.small-slider')
    @include('client.partials.small-nav-wonderful')
    <div class="container">
        <h2 class="py-5 fs-1 fw-bold">Wonderful Story Camp</h2>
        <img src="{{asset('imgs/camps/camp_title.jpg')}}" alt="" class="w-100">
        <img src="{{asset('imgs/camps/bridge_logo.png')}}" alt="" class="w-100">
        <p class="fs-6 lh-base">
            Hội trại Những câu chuyện kỳ diệu là chương trình hội trại đọc Kinh Thánh xuyên suốt dành cho thiếu nhi được tổ chức Chiếc cầu Việt Nam xây dựng nhằm mục đích cung cấp sách Những câu chuyện kỳ diệu cho trẻ em Việt Nam. Đây là chương trình dành cho trẻ em tham gia trại Những câu chuyện kỳ diệu, được tổ chức trong vòng 8 tiếng bao gồm các tiết mục múa ngợi khen, kịch câm, đố vui, trò chơi và đọc truyện tranh Những câu chuyện kỳ diệu. Hiện tại, mục vụ này được các đoàn truyền giáo ngắn hạn sử dụng một cách có hiệu quả tại Việt Nam và nhiều quốc gia khác.
        </p>

        <ul>
            <h2 class="py-5 fs-1 fw-bold">Lịch sử và tình hình hiện nay</h2>
            <li class="row mb-3">
                <p class="col-2 wonderful-year">2011</p>
                <p class="col">Bắt đầu xây dựng hội trại Những câu chuyện kỳ diệu</p>
            </li>
            <li class="row mb-3">
                <p class="col-2 wonderful-year">2012</p>
                <div class="wrap col">
                    <p>Chế tác DVD hội trại Những câu chuyện kỳ diệu (múa ngợi khen, kịch câm, hướng dẫn thực hiện, vv)</p>
                    <p>Tổ chức 100 hội trại Những câu chuyện kỳ diệu tại Việt Nam (100 hội thánh Việt Nam/5.182 trẻ em tham gia/ 77 đoàn truyền giáo ngắn hạn tham dự)</p>
                </div>
            </li>
            <li class="row mb-3">
                <p class="col-2 wonderful-year">2014</p>
                <div class="wrap col">
                    <p>Thái Lan quốc gia đã tổ chức hội trại những câu chuyện kỳ diệu</p>
                    <p>Chuyển giao mục vụ hội trại Những câu chuyện kỳ diệu cho tổ chức GHM Việt Nam.</p>
                </div>
            </li>
            <li class="row mb-3">
                <p class="col-2 wonderful-year">2015</p>
                <div class="wrap col">
                    <p>Mông Cổ quốc gia đã Tổ chức Hội trại Những Câu Chuyện kỳ diệu tại Mông Cổ</p>
                    <p>Myanmar quốc gia đã Tổ chức Hội trại Những Câu Chuyện kỳ diệu tại Myanmar</p>
                </div>
            </li>
            <li class="row mb-3">
                <p class="col-2 wonderful-year">2016</p>
                <p class="col">Cambodia quốc gia đã Tổ chức Hội trại Những Câu Chuyện kỳ diệu tại Cambodia</p>
            </li>
            <li class="row mb-3">
                <p class="col-2 wonderful-year">2017</p>
                <p class="col">Ấn Độ quốc gia đã Tổ chức Hội trại Những Câu Chuyện kỳ diệu tại Ấn Độ</p>
            </li>
            <li class="row mb-3">
                <p class="col-2 wonderful-year">2018</p>
                <div class="wrap col">
                    <p>Dân tộc Pura của Thái Lan quốc gia đã Tổ chức Hội trại Những Câu Chuyện kỳ diệu tại Thái Lan</p>
                    <p>Băng-la-đéc quốc gia đã Tổ chức Hội trại Những Câu Chuyện kỳ diệu tại Băng-la-đéc</p>
                </div>
            </li>
            <li class="row mb-3">
                <p class="col-2 wonderful-year">2019</p>
                <p class="col">Lào quốc gia đã Tổ chức Hội trại Những Câu Chuyện kỳ diệu tại Lào</p>
            </li>
        </ul>
        <p class="text-center fs-4">* Tính đến năm 2019, đã có 10,360 trẻ em tham gia tại 207 hội thánh ở Việt Nam</p>
    </div>
@endsection