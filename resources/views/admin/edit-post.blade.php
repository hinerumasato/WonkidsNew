@php
    use App\Helpers\StringHelper;
@endphp

<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/base.css')}}">
    <link rel="stylesheet" href="{{asset('css/add-post.css')}}">
    <title>Document</title>
</head>
<body>
    <h1 class="py-4 bg-dark bg-gradient text-white">
        <div class="container">
            SỬA BÀI
        </div>
    </h1>
    <div class="container">

        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif

        <form action="" method="POST">
            <p class="fs-3 mb-0">Chọn ngôn ngữ</p>
            <select name="language_id" class="form-select language-select" aria-label="Default select example">
                @foreach ($languages as $language)
                    <option link="{{route('admin.posts.edit', ['post_id' => $data['post_id'], 'language_id' => $language->id])}}" value="{{$language->id}}">{{ $language->name }}</option>
                @endforeach
            </select>

            <p class="fs-3 mt-3 mb-0">Chọn mục</p>
            <select selected name="category_id" class="form-select category-select" aria-label="Default select example">
                @foreach ($categories as $category)
                    <option value="{{$category['id']}}">{{ StringHelper::gerateLineByLevel($category['level']).$category['name'] }}</option>
                @endforeach
            </select>
            <div class="my-3">
                <label for="exampleFormControlInput1" class="form-label fs-3">Tiêu Đề</label>
                <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="{{$data['title']}}" placeholder="Tiêu Đề">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label fs-3">Nội dung</label>
                <textarea style="height: 900px !important;" name="content" class="form-control" id="exampleFormControlTextarea1" rows="3">
                    {{ $data['content'] }}
                </textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="upload-post border">

                <div class="upload-post_header p-3 d-flex justify-content-start align-items-center">
                    <button class="border border-none shadow-sm bg-body-tertiary rounded" type="button" onclick="document.querySelector('.file-post-input').click()">Đính kèm</button>
                    <small class="ms-2">Bấm vào đây để đính kèm file</small>
                </div>
                <input type="file" name="file" id="" multiple class="d-none file-post-input">
                <div class="upload-post-info">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-sm btn-outline-secondary">Chèn vào bài viết</button>
                        <button class="btn btn-sm btn-outline-secondary">Xoá file đã chọn</button>
                    </div>

                    <div class="upload-post-info-imgs d-flex">
                        @foreach ($imgLinks as $link)
                            <div class="upload-post-info-wrap">
                                <img src="{{$link}}" alt="" class="upload-post-info-img">
                                <input type="checkbox" name="" id="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary ms-auto d-block py-2 px-3">Cập Nhật</button>
            @method('PUT')
            @csrf
        </form>
    </div>

    <script src="{{asset("js/bootstrap.js")}}"></script>
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
        let language_id = <?php echo $data['language_id']; ?>;
        let category_id = <?php echo $data['category_id']; ?>;
        const categorySelect = document.querySelector('.category-select');
        categorySelect.value = category_id;
        languageSelect.value = language_id;
    </script>
    
</body>
</html>