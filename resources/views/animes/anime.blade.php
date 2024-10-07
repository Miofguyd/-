<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>First</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('/css/first.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>アニメ板！</h1>
        <div class='indexes'>
            <h1 class='anime_title'>{{ $anime->title }}</h1>
            <div class='anime_picture'>
             <img src="{{ $details['images']['recommended_url'] }}" alt="{{ $anime['title'] }}の画像" style="max-width: 300px;">
            </div>
            {{ $details['images']['recommended_url'] }}
            <h2>監督</h2>
            <h2>声優</h2>
        </div>
    </body>
</html>