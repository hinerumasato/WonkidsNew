@php
    use App\Helpers\StringHelper;
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/add-post.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Document</title>
</head>

<body>

    <h1 class="py-4 bg-dark bg-gradient text-white">
        <div class="container">
            ĐĂNG BÀI
        </div>
    </h1>

    <div class="container">
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
                    value="{{ old('title') }}" placeholder="Tiêu Đề">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label fs-3">Nội dung</label>
                <textarea style="height: 900px !important;" value="{{ old('content') }}" name="content" class="form-control"
                    id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="upload-post border">

                @php
                    use App\Models\StagingArea;
                    $imgLinks = StagingArea::all();
                @endphp

                <div class="upload-post_header p-3 d-flex justify-content-start align-items-center">
                    <button class="px-3 py-1 border border-none shadow-sm bg-body-tertiary rounded" type="button"
                        onclick="document.querySelector('.file-post-input').click()">
                        <i class="fa-solid fa-paperclip me-2"></i>
                        Đính kèm
                    </button>
                    <small class="ms-2">Bấm vào đây để đính kèm file</small>
                </div>
                <input type="file" name="file" id="" multiple class="d-none file-post-input">
                <div class="upload-post-info">
                    <div class="d-flex justify-content-between ps-3">
                        <span class="file-quantity">{{ count($imgLinks) }} ảnh đã đính kèm</span>
                        <div class="btn-wrap">
                            <button class="btn btn-sm btn-outline-secondary">Chèn vào bài viết</button>
                            <button class="btn btn-sm btn-outline-secondary">Xoá file đã chọn</button>
                        </div>
                    </div>

                    <div class="upload-post-info-imgs d-flex ps-3">

                        @foreach ($imgLinks as $img)
                            <div class="upload-post-info-wrap">
                                <img src="{{ $img->contents }}" alt="" class="upload-post-info-img">
                                <input type="checkbox" name="" id="">
                                <input type="hidden" name="imgSrc[]" value="{{ $img->link }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary ms-auto d-block py-2 my-3 px-3">Đăng</button>
            @csrf
        </form>
    </div>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/pd9ebc8uusu182469qo1vzpwdf8zyocpvs7jp1qotwdh1c08/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'code anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>

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
    <script>
        const uploadImageLink = @json(route('uploadImage'));
        const postFolder = @json(asset('uploads/posts'));
    </script>

    <script src="{{ asset('js/add-post.js') }}"></script>

</body>

</html>
