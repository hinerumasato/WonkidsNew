@extends('admin.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/ui.css') }}">
@endsection

@section('content')
    <h2 class="slider-title mt-3">Cài đặt Slider</h2>
    <ul class="nav nav-underline">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Slider</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Header</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Footer</a>
        </li>
    </ul>

    <button onclick="openExplorer();" class="my-3 text-white add-slider-btn border-0">
        <img src="{{ asset('imgs/icon/plus.png') }}" alt="">
        <span>Thêm Slider</span>
    </button>

    <div class="slider-img-wrap row row-cols-2 mt-4">
        @foreach ($sliders as $slider)
            <img src="{{ $slider->links }}" alt="" class="slider-img col">
        @endforeach
    </div>


    <div class="content-details">
        <h2 class="content-details-title">Nội dung chi tiết</h2>
        @foreach ($allLanguages as $language)
            <div class="content-details-input-wrap mt-3 d-flex" locale="{{$language->locale}}">
                <input type="text" class="content-details-text-field w-75 border-0" placeholder="Nhập nội dung...">
                <span class="input-label">Nội dung</span>
                <div class="content-details-select-language w-25">
                    <button class="btn btn-white" type="button" aria-expanded="false">
                        <img class="language-logo" src="{{ $language->icon }}" alt="">
                        <span>{{ $language->name }}</span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <button class="save-btn">Lưu</button>

    <input type="file" class="d-none slider-input" multiple accept="image/png, image/gif, image/jpeg">
@endsection

@section('scripts')
    <script>
        const uploadSliderLink = @json(route('upload-slider'));
    </script>

    <script src="{{ asset('js/MyBlobInfo.js') }}"></script>
    <script src="{{ asset('js/admin/ui/slider.js') }}"></script>
@endsection