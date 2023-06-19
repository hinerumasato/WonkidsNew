@php
    use App\Helpers\StringHelper;
@endphp
@extends('admin.layouts.crud')

@section('content')
    <form action="{{ route('admin.posts.postAdd') }}" method="POST" id="post-add-form">

        <p class="fs-3 mb-0">Chọn ngôn ngữ</p>
        <select name="language_locale" class="form-select language-select" aria-label="Default select example">
            @foreach ($languages as $language)
                <option link="{{ route('admin.posts.add') }}" value="{{ $language->locale }}">{{ $language->name }}
                </option>
            @endforeach
        </select>

        <p class="fs-3 mt-3 mb-0">Chọn mục</p>
        <select name="category_id" id="category_select" class="form-select category_select"
            aria-label="Default select example">
            @foreach ($categories as $category)
                <option originText="{{ StringHelper::gerateLineByLevel($category['level']) . $category['name'] }}"
                    value="{{ $category['id'] }}">
                    {{ StringHelper::gerateLineByLevel($category['level']) . $category['name'] }}</option>
            @endforeach
        </select>
        <div class="my-3">
            <label for="exampleFormControlInput1" class="form-label fs-3">Tiêu Đề</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1"
                value="{{ old('title') ?? $data['title'] }}" placeholder="Tiêu Đề">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label fs-3">Nội dung</label>
            <textarea style="height: 900px !important;" name="content" class="form-control" id="crudArea" rows="3">
                {!! old('content') !!}
            </textarea>
        </div>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @include('admin.partials.form-data')
        <button type="submit" class="btn btn-primary ms-auto d-block py-2 my-3 px-3">Đăng</button>
        @csrf
    </form>
@endsection

@section('scripts')
    <script>
        function changeLanguagePost() {
            const languageSelect = document.querySelector('.language-select');
            languageSelect.value = @json($languageLocale);
            languageSelect.onchange = () => {
                const selectedIndex = languageSelect.selectedIndex;
                const link =
                    `${languageSelect.querySelectorAll('option')[selectedIndex].getAttribute('link')}?post_lang=${languageSelect.value}`;
                window.location.replace(link);
            }
        }

        changeLanguagePost();
    </script>
@endsection
