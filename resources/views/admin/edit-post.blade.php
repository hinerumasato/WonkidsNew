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
                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3">
                    {{ $data['content'] }}
                </textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary ms-auto d-block py-2 px-3">Cập Nhật</button>
            @method('PUT')
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