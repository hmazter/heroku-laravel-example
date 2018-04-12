<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
<div id="app" class="container">
    <h1>Hmazter's fake blog for Heroku test</h1>

    @foreach($posts as $post)
    <div class="card post">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{!! nl2br($post->body)  !!}</p>
        </div>
    </div>
    @endforeach
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
