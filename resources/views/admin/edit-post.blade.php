@php
    use App\Helpers\StringHelper;
@endphp
@extends('admin.layouts.crud')

@section('content')
    <form action="" method="POST">

        <p class="fs-3 mb-0">Chọn ngôn ngữ</p>
        <select name="language_id" class="form-select language-select" aria-label="Default select example">
            @foreach ($languages as $language)
                <option
                    link="{{ route('admin.posts.edit', ['post_id' => $data['post_id'], 'language_id' => $language->id]) }}"
                    value="{{ $language->id }}">{{ $language->name }}</option>
            @endforeach
        </select>

        <p class="fs-3 mt-3 mb-0">Chọn mục</p>
        <select selected name="category_id" class="form-select category-select" aria-label="Default select example">
            @foreach ($categories as $category)
                <option value="{{ $category['id'] }}">
                    {{ StringHelper::gerateLineByLevel($category['level']) . $category['name'] }}</option>
            @endforeach
        </select>
        <div class="my-3">
            <label for="exampleFormControlInput1" class="form-label fs-3">Tiêu Đề</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1"
                value="{{ $data['title'] }}" placeholder="Tiêu Đề">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label fs-3">Nội dung</label>
            <textarea style="height: 900px !important;" name="content" class="form-control" id="crudArea"
                rows="3">
                    {!! $data['content'] !!}
                </textarea>
        </div>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @include('admin.partials.form-data')

        <button type="submit" class="btn btn-primary ms-auto d-block py-2 px-3">Cập Nhật</button>
        @method('PUT')
        @csrf
    </form>
@endsection

@section('scripts')

    <script>
        const languageSelect = document.querySelector('.language-select');
        document.querySelector('form').setAttribute("action", window.location.href);

        languageSelect.onchange = () => {
            const selectedIndex = languageSelect.selectedIndex;
            const option = languageSelect.querySelectorAll('option')[selectedIndex];
            const link = option.getAttribute("link");
            window.location.replace(link);

        }
    </script>

    <script>
        let language_id = @json($data['language_id']);
        let category_id = @json($data['category_id']);
        const categorySelect = document.querySelector('.category-select');
        categorySelect.value = category_id;
        languageSelect.value = language_id;
    </script>
@endsection
