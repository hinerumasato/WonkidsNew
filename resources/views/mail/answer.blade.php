<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <title>Email</title>
</head>
<body>
    <h2>{{ $title }}</h2>
    <p>{!! $content !!}</p>
    <p>Bạn có đồng ý với câu trả lời không?</p>
    <div class="d-flex justify-content-center">
        <a href="{{route('mail.success', ['token' => $token])}}" class="btn btn-success">Đồng ý</a>
        <a href="{{route('mail.decline', ['token' => $token])}}" class="btn btn-danger">Từ chối</a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>