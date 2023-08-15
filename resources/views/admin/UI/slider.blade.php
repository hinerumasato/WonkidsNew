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

    <button class="my-3 text-white add-slider-btn border-0">
        <img src="{{ asset('imgs/icon/plus.png') }}" alt="">
        <span>Thêm Slider</span>
    </button>

    <div class="slider-img-wrap row mt-4">

        @if (count($sliders) == 0)
            <div class="alert alert-primary text-center fw-bold" role="alert">
                CHƯA CÓ SLIDER NÀO, TRANG WEB SẼ SỬ DỤNG SLIDER MẶC ĐỊNH
            </div>
        @endif

        @foreach ($sliders as $slider)
            <div class="col slider-icon-wrap">
                <div class="pseudo-slider-icon"></div>
                <img src="{{ $slider->links }}" alt="" class="slider-img w-100 h-100">
                <i class="fa-solid fa-trash trash-icon"></i>
            </div>
        @endforeach
    </div>


    <div class="content-details">
        <h2 class="content-details-title">Mô tả Slider</h2>
        @foreach ($allLanguages as $language)
            <div class="content-details-input-wrap mt-3 d-flex" locale="{{ $language->locale }}">
                @if (array_key_exists($language->locale, $descriptions))
                    <input type="text" value="{{ $descriptions[$language->locale] }}" class="content-details-text-field w-75 border-0" placeholder="Nhập nội dung...">
                @else
                    <input type="text" class="content-details-text-field w-75 border-0" placeholder="Nhập nội dung...">
                @endif
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

    <button type="button" class="btn btn-primary modal-btn d-none" data-bs-toggle="modal" data-bs-target="#sliderModel"></button>

    <!-- Modal -->
    <div class="modal fade" id="sliderModel" tabindex="-1" aria-labelledby="sliderModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="sliderModelLabel">Thông báo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có muốn xoá Slider này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-danger slider-delete-btn">Xoá</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const uploadSliderLink = @json(route('upload-slider'));
        const deleteSliderLink = @json(route('delete-slider'));
        const updateSliderDescriptionLink = @json(route('update-slider-description'));
    </script>

    <script src="{{ asset('js/MyBlobInfo.js') }}"></script>
    <script src="{{ asset('js/Admin/UI/slider.js') }}"></script>
@endsection
