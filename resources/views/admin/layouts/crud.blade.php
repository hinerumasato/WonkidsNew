<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/crud.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('imgs/icon/crud.ico') }}">
    <title>{{ $title }}</title>
</head>

<body>
    <h1 class="py-4 bg-dark bg-gradient text-white">
        <div class="container">
            {{ $title }}
        </div>
    </h1>

    <div class="container">
        @yield('content')
    </div>

    <script>
        const uploadStagingAreaLink = @json(route('upload-staging-area'));
        const deleteStagingAreaLink = @json(route('delete-staging-area'));
        const uploadImgLink = @json(route('upload-img-area'));
        const deleteImgLink = @json(route('delete-img-area'));
        const uploadMediaStagingAreaLink = @json(route('upload-media-area'));
        const uploadMediaLink = @json(route('upload-media'));
        const postFolder = @json(asset('uploads/posts'));
        const addPostLink = @json(route('admin.posts.add'));
        const medias = @json($data['medias']);
    </script>

    <script src="https://cdn.tiny.cloud/1/pd9ebc8uusu182469qo1vzpwdf8zyocpvs7jp1qotwdh1c08/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="{{ asset('js/crud.js') }}"></script>
    <script src="{{asset('js/plugin.js')}}"></script>
    <script src="{{ asset('js/MyBlobInfo.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#crudArea',
            images_upload_handler: imageUploadHandler,
            images_upload_base_path: @json(asset('uploads/posts')),
            relative_urls: false,
            remove_script_host: false,
            extended_valid_elements: 'div[class|hspace|vspace|width|height|align|onmouseover|onmouseout|name|media]',
            plugins: 'customButton code anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'customButton | undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>

    @yield('scripts')
    @stack('scripts')


</body>

</html>
