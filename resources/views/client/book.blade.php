@extends('client.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/wonderful.css') }}">
@endsection
@section('content')
@include('client.partials.small-slider')
@include('client.partials.small-nav-wonderful')
    <div class="container">
        <h2 class="py-5 fs-1 fw-bold">Wonderful Story Book</h2>
        <img class="d-block w-100" src="{{ asset('imgs/books/book1.jpg') }}" alt="">
        <img class="d-block" src="{{ asset('imgs/books/bach_logo.png') }}" alt="">
        <p class="fs-6 my-3 lh-base">
            Sách “ Những câu chuyện kỳ diệu” là truyện tranh Kinh Thánh được đọc bởi tấm lòng của người mẹ và xuất bản bởi
            tổ chức BACH (Bible in All Children’s Hands) và tổ chức Chiếc cầu Việt Nam.
            Bộ truyện tranh “ Những câu chuyện kì diệu” gồm hai quyển truyện tranh màu Tân Ước và Cựu Ước, với 72 câu chuyện
            dành cho thiếu nhi. Bộ truyện tranh này được xuất bản và phổ biến rộng rãi nhờ sự trình bày của Tổng liên hội
            Hội Thánh Tin Lành Việt Nam với sự cho phép của nhà nước Việt Nam và sự tài trợ từ hội thánh Hàn Quốc. (tính đến
            năm 2019, in lần thứ tư, gồm 30. 000 bộ)
            Bộ truyện tranh này cũng được dịch, xuất bản và phổ biến với nhiều ngôn ngữ dân tộc thiểu số của Việt Nam và
            khoảng 30 quốc gia khác trên toàn thế giới.
        </p>
        <img class="d-block w-100" src="{{ asset('imgs/books/book2.jpg') }}" alt="">
        <ul>
            <h2 class="py-3 fs-2 fw-bold">Lịch sử và tình hình hiện nay</h2>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2007-2009</p>
                <p class="col">Chế tác sách ‘Những câu chuyện kỳ diệu’ (BACH)</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2011</p>
                <p class="col">Có giấy phép tại Việt Nam và xuất bản lần đầu (BACH), Bắt dầu dự án cộng đồng Wonderful Story (BACH, Tổ
                    chức Chiếc Cầu Việt Nam)</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2011-2018</p>
                <p class="col">Xuất bản tiếng Việt đầu tiên(2.000 bộ), thứ 2(5.000 bộ), thứ 3(10.000 bộ), thứ 4(12.000 bộ)</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2014-2019</p>
                <p class="col">Tiếng Thái</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2015</p>
                <p class="col">Tiếng Mông Cổ, Trung Quốc, Hàn Quốc, Anh, Hindi(Ấn Độ)</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2016</p>
                <p class="col">Tiếng Syria, Hy Lạp, Campuchia, El Salvador, Myanmar, Thổ Nhĩ Kỳ</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2017</p>
                <p class="col">Tiếng Tây Ban Nha, Syria(thứ 2), Dari, Ả Rập, Bengal(Ấn Độ), Quảng Đông(Trung Quốc)</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2018</p>
                <p class="col">Tiếng Ả Rập Levant, dân tộc Pura của Thái Lan, Tag Tag(Phillipines), Shai(Tanzania)</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2019</p>
                <p class="col">Nepal, Syria</p>
            </li>
        </ul>

        <ul class="mt-3">
            <h2 class="py-3 fs-2 fw-bold">Tình hình xuất bản của những dân tộc thiểu số Việt Nam</h2>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2014</p>
                <p class="col">H'Mong (2.500 bộ)</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2015</p>
                <p class="col">Cơ Ho (1.000 bộ)</p>
            </li>
            
            <li class="row mb-2">
                <p class="wonderful-year col-2">2015</p>
                <p class="col">M’ Nông (1.000 bộ)</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2016</p>
                <p class="col">Ê Đê (1.000 bộ)</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2016</p>
                <p class="col">X’ Tiêng (2.000 bộ)</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2017</p>
                <p class="col">Ra Glai (2.000 bộ)</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2018</p>
                <p class="col">Ba Na (2.000 bộ)</p>
            </li>
            <li class="row mb-2">
                <p class="wonderful-year col-2">2019</p>
                <p class="col">Giẻ Triêng (2.000 bộ)</p>
            </li>
        </ul>
    </div>
@endsection
