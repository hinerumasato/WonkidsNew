<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Mail</title>
</head>

<style>
    #contact {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 5px;
    }
</style>

<body>
    <p>Hello, you have a new contact message</p>

    <div id="contact">
        <h2>{{ $title }}</h2>
        {{ $content }}
    </div>

    <p>Best regard</p>
</body>
</html>