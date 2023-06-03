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
    <title>Document</title>
</head>
<body>
    
    <h1 class="py-4 bg-dark bg-gradient text-white">
        <div class="container">
            ĐĂNG BÀI
        </div>
    </h1>

    <div class="container">
        <form action="{{route('admin.posts.postAdd')}}" method="POST">
            <p class="fs-3 mb-0">Chọn ngôn ngữ</p>
            <select name="language_locale" class="form-select language-select" aria-label="Default select example">
                @foreach ($languages as $language)
                    <option link="{{route('admin.posts.add')}}" value="{{$language->locale}}">{{ $language->name }}</option>
                @endforeach
            </select>

            <p class="fs-3 mt-3 mb-0">Chọn mục</p>
            <select name="category_id" id="category_select" class="form-select" aria-label="Default select example">
                @foreach ($categories as $category)
                    <option originText="{{StringHelper::gerateLineByLevel($category['level']).$category['name']}}" value="{{$category['id']}}">{{ StringHelper::gerateLineByLevel($category['level']).$category['name'] }}</option>
                @endforeach
            </select>
            <div class="my-3">
                <label for="exampleFormControlInput1" class="form-label fs-3">Tiêu Đề</label>
                <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="{{old('title')}}" placeholder="Tiêu Đề">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label fs-3">Nội dung</label>
                <textarea value="{{ old('content') }}" name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary ms-auto d-block py-2 my-3 px-3">Đăng</button>
            @csrf
        </form>
    </div>
    <script src="{{asset("js/bootstrap.js")}}"></script>
    <script src="https://cdn.tiny.cloud/1/pd9ebc8uusu182469qo1vzpwdf8zyocpvs7jp1qotwdh1c08/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        //   tinycomments_author: 'Author name',
        //   mergetags_list: [
        //     { value: 'First.Name', title: 'First Name' },
        //     { value: 'Email', title: 'Email' },
        //   ]
        });
    </script>

    <script>
        function changeLanguagePost() {
            const languageSelect = document.querySelector('.language-select');
            languageSelect.value = @json($languageLocale);
            console.log(languageSelect.value);
            languageSelect.onchange = () => {
                const selectedIndex = languageSelect.selectedIndex;
                const link = `${languageSelect.querySelectorAll('option')[selectedIndex].getAttribute('link')}?post_lang=${languageSelect.value}`;
                window.location.replace(link);
            }
        }

        changeLanguagePost();
    </script>
</body>
</html>