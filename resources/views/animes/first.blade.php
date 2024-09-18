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
                <h1 class='hot_tag'>話題のタグ</h1>
                <h1 class='season_anime'>今期アニメランキング</h1>
                <a href="/anime">画像</a>
                <h1 class='best_anime'>歴代アニメランキング</h1>
        </div>
        <div class="first">
            @foreach($animes as $anime)
                <a href="/animes/{{ $anime->id }}">{{ $anime->name }}</a>
            @endforeach
        </div>
    </body>
</html>